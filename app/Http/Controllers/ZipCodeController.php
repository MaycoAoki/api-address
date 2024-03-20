<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchAddressRequest;
use App\Models\Address;
use App\Repositories\AddressRepository;
use App\Services\Address\AddressService;
use Illuminate\Http\Request;

class ZipCodeController extends Controller
{
    public function __construct(
        private AddressService $service, private AddressRepository $repository)
    {
    }

    public function index()
    {
        return $this->service->getAllAddress();
    }

    public function update(Request $request, Address $address)
    {
        return $this->repository->update($address, $request->all());
    }

    public function show(Address $address)
    {
        return $this->repository->getById($address->id);
    }

    public function destroy(Address $address)
    {
        return $this->repository->delete($address);
    }

    public function searchPublicPlace(SearchAddressRequest $request)
    {
        return $this->service->searchPublicPlace($request->all());
    }

    public function getZipCode(Request $request)
    {
        return $this->service->getZipCode($request->zipCode);
    }
}
