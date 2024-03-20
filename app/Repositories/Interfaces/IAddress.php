<?php

namespace App\Repositories\Interfaces;

use App\Models\Address;

interface IAddress
{
    public function getAll();

    public function getById($id);

    public function create(array $data);

    public function update(Address $student, array $data);

    public function delete(Address $student);
}
