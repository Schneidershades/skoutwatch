<?php

namespace Api\Traits\Curl;

class CurlRequest
{
    public function __construct(
            public string $apiUrl,
            public string $bearerToken,
            public string $requestType,
            public string $fields,
    ){}

    public function sendRequest()
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->requestType,
            CURLOPT_POSTFIELDS => $this->fields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer '.$this->bearerToken,
            ],
        ]);

        $response = curl_exec($curl);

        return json_decode($response);
    }
}
