<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Interfaces\IStudent;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements IStudent
{

    public function getAll()
    {
        return Student::all();
    }

    public function paginate(): array|Collection
    {
        return Student::with('address')->get();
    }

    public function getByIdWith($id): Collection|array
    {
        return Student::with('address')->where('id', $id)->get();
    }
    public function getById($id)
    {
        return Student::find($id);
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function update(Student $student, array $data)
    {
        return $student->update($data);
    }

    public function delete(Student $student)
    {
        return $student->delete();
    }
}
