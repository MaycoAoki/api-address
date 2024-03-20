<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Interfaces\IAddress;

class AddressRepository implements IAddress
{

    public function getAll()
    {
        return Address::all();
    }

    public function getById($id)
    {
        return Address::find($id);
    }

    public function create(array $data)
    {
        return Address::create($data);
    }

    public function update(Address $address, array $data)
    {
        return $address->update($data);
    }

    public function delete(Address $student)
    {
        return $student->delete();
    }
}
