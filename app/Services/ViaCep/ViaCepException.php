<?php

namespace App\Services\ViaCep;


class ViaCepException extends \Exception
{
    public function __construct(private readonly ViaCepResponse $response)
    {
        parent::__construct($this->response->errorMessage());
    }

    public function response()
    {
        return $this->response;
    }

    public function context()
    {
        return [
            'responseContents' => $this->response->contents(),
            'statusCode' => $this->response->status(),
            'requestData' => filter_sensitive_info($this->response->requestData())
        ];
    }
}
