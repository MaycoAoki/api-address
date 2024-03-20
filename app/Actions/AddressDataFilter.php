<?php

namespace App\Actions;

use App\Models\Address;
use App\Repositories\AddressRepository;
use App\Services\ViaCep\ViaCep;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;


class AddressDataFilter
{
    public function __construct(private ViaCep $cep)
    {
    }

    public function handle(array $data)
    {
        $address = $this->checkAddress($data);

        if (count($address) > 0) {
            return $address;
        }

        $response = $this->getPublicPlace($data);

        if (!$response) {
            throw new Exception('Cep não encontrado');
        }

        return $this->saveAddress($response);
    }

    private function checkAddress(array $data): Collection|array
    {
        $query = Address::query();

        if (isset($data['cep'])) {
            $query->where('cep', 'like', '%' . $data['cep'] . '%');
        }
        if (isset($data['logradouro'])) {
            $query->where('logradouro', 'like', '%' . $data['logradouro'] . '%');
        }

        return $query->orderBy('id')->get();

    }

    private function getPublicPlace(array $data)
    {
        if (isset($data['cep'])) {
            $zip_code = preg_replace("/-/", "", $data['cep']);
            $response[] = $this->cep->getZipCode($zip_code);
        }

        if (isset($data['logradouro'])) {
            $response[] = $this->cep->getPublicPlace($data);
        }


        return $this->saveAddress($response);
    }

    private function saveAddress(mixed $address)
    {
        $response = [];

        foreach ($address as $item) {
            $data = Arr::only($item, ['cep', 'logradouro', 'complemento', 'bairro', 'localidade', 'uf']);
            $response[] = (new AddressRepository())->create($data)->toArray();
        }
        return $response;
    }


}
