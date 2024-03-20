<?php

namespace App\Services\ViaCep;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Arr;

class ViaCepResponse
{
    private $response;
    private $requestData;
    private $contents;
    private $status;
    private $json;
    private $headers = [];
    private $errorMessage;
    private $errorCode;

    public function __construct(Response $response, array $requestData)
    {
        $this->response = $response;
        $this->requestData = $requestData;
        $this->contents = $this->response->getBody()->getContents();
        $this->headers = $this->response->getHeaders();
        $this->status = $this->response->getStatusCode();
    }

    public function json(string $path = null)
    {
        if (!$this->json) {
            $this->json = json_decode($this->contents, true);
        }

        return $path ? Arr::get($this->json, $path) : $this->json;
    }

    public function status()
    {
        return $this->status;
    }

    public function header(string $header)
    {
        return Arr::get($this->headers, $header . ".0");
    }

    public function failed()
    {
        return $this->status >= 400;
    }

    public function clientError()
    {
        return $this->status >= 400 && $this->status < 500;
    }

    public function serverError()
    {
        return $this->status >= 500;
    }

    public function success()
    {
        return $this->status >= 200 && $this->status < 400;
    }

    public function requestData()
    {
        return $this->requestData;
    }

    public function contents()
    {
        return $this->contents;
    }

    public function errorMessage()
    {
        if (!$this->errorMessage) {
            $this->errorMessage = "UNKNOWN ERROR";
        }
        return $this->errorMessage;
    }

    public function errorCode()
    {
        if (!$this->errorCode) {
            $this->errorCode = "UNKNOWN_ERROR";
        }
        return $this->errorCode;
    }

}
