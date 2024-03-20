<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddressRequest;
use App\Models\Address;
use App\Models\Student;
use App\Services\Student\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function __construct(private readonly StudentService $service)
    {
    }

    public function index()
    {
        return $this->service->paginate();
    }

    public function store(StudentAddressRequest $request)
    {
        return $this->service->create($request->all());
    }

    public function show(Student $student)
    {
        return $this->service->getStudent($student);
    }

    public function update(StudentAddressRequest $request, Student $student)
    {
        return $this->service->update($student, $request->all());
    }

    public function destroy(Student $student)
    {
        return $this->service->delete($student);
    }
}

