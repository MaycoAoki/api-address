<?php

namespace App\Services\Student;

use App\Models\Student;
use App\Repositories\AddressRepository;
use App\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\Collection;

class StudentService
{

    public function __construct(
        private StudentRepository $studentRepository,
        private AddressRepository $addressRepository
    )
    {
    }

    public function paginate(): array|Collection
    {
        return $this->studentRepository->paginate();
    }

    /**
     * @throws \Exception
     */
    public function create(array $data)
    {
        if (isset($data['address'])) {
            return $this->createStudentWithAddress($data);
        }

        return $this->studentRepository->create($data['student']);
    }

    public function getStudent(Student $student)
    {
        return $this->studentRepository->getByIdWith($student->id);
    }

    /**
     * @throws \Exception
     */
    public function update(Student $student, array $data)
    {
        if (isset($data['address'])) {
            return $this->updateStudentWithAddress($data);
        }
        return $this->studentRepository->update($student, $data['student']);
    }

    public function delete(Student $student)
    {
        return $this->studentRepository->delete($student);
    }

    private function createStudentWithAddress(array $data)
    {
        $address = $data['address'];
        $address_created = $this->addressRepository->create($address);

        if (!$address_created) {
            throw new \Exception('Não foi possivel criar endereço');
        }

        $student = $data['student'];

        $student['address_id'] = $address_created->id;

        return $this->studentRepository->create($student);
    }

    private function updateStudentWithAddress(array $data)
    {
        if ($data['student']) {
            $student_data = $data['student'];
        }

        $student = $this->studentRepository->getById($student_data['id']);

        if (!$student) {
            throw new \Exception("Estudante não encontrado.");
        }

        $this->studentRepository->update($student, $student_data);

        if (empty($student->address_id)) {
            $address = $this->addressRepository->create($data['address']);
            $student->address_id = $address->id;
            $student->save();
            return $student;
        }

        $address_data = $data['address'];

        $address = $this->addressRepository->getById($student->address_id);

        return $this->addressRepository->update($address, $address_data);
    }

}
