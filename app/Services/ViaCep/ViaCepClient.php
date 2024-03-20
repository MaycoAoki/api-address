<?php

namespace App\Services\ViaCep;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class ViaCepClient
{
    private $base_uri;

    public function __construct(string $base_uri)
    {
        $this->base_uri = $base_uri;
    }

    public function request(string $method, string $path, array $data = [])
    {
        $client = new Client(['base_uri'  => $this->base_uri]);

        $rawResponse = $client->request($method, $path);

        return $this->handleResponse($rawResponse, array_merge(compact('method', 'path')));
    }

    /**
     * @throws ViaCepException
     */
    private function handleResponse(Response $rawResponse, array $requestData): ViaCepResponse
    {
        $response = new ViaCepResponse($rawResponse, $requestData);

//        RequestLogger::log($response);

        if ($response->success()) {
            return $response;
        }

        throw new ViaCepException($response);
    }
}
