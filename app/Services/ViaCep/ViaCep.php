<?php

namespace App\Services\ViaCep;


class ViaCep
{
    protected $client;

    public function __construct(ViaCepClient $client)
    {
        $this->client = $client;
    }

    public function getZipCode(string $zepCode)
    {
        return $this->client->request('GET', "/ws/{$zepCode}/json/")->json();
    }

    public function getPublicPlace(array $data)
    {
        return $this->client->request('GET', "/ws/{$data['uf']}/{$data['localidade']}/{$data['logradouro']}/json/")->json();
    }
}
