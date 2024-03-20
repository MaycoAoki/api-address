<?php

namespace Database\Seeders;

use App\Repositories\AddressRepository;
use App\Services\ViaCep\ViaCep;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(ViaCep $cep, AddressRepository $repository): void
    {
        $data = [
            "81010-184",
            "81170-210",
            "81170-423",
            "81830-190",
            "81820-170",
            "81170-202",
            "82100-562",
            "81670-200",
            "81170-433",
            "81920-758",
            "81550-130",
            "81880-380",
            "81825-236",
            "81330-570",
            "80320-350",
            "80630-020",
            "81470-380",
            "81900-600",
            "81050-360",
            "80510-380"
        ];

        foreach ($data as $item) {
            $response = $cep->getZipCode($item);
            $address = Arr::only($response, ['cep', 'logradouro', 'complemento', 'bairro', 'localidade', 'uf']);
            $repository->create($address);

        }
    }
}
