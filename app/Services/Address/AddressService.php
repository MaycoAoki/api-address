<?php

namespace App\Services\Address;

use App\Actions\AddressDataFilter;
use App\Repositories\AddressRepository;
use App\Services\ViaCep\ViaCep;

class AddressService
{
    public function __construct(
        private AddressRepository $repository,
        private ViaCep $service,
        private AddressDataFilter $dataFilter
    ){}

    public function getZipCode(string $zipCode)
    {
        return $this->service->getZipCode($zipCode);
    }
    public function getAllAddress()
    {
        return $this->repository->getAll();
    }

    public function searchPublicPlace(array $data)
    {
        return $this->dataFilter->handle($data);
    }
}
