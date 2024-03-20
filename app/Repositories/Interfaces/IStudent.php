<?php

namespace App\Repositories\Interfaces;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

interface IStudent
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function update(Student $student, array $data);

    public function delete(Student $student);


}
