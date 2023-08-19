<?php

namespace App\Traits\Web3Mint;

use App\Traits\Curl\CurlRequest;

class Helius
{
    protected $url;
    protected $key;
    protected $receiverAddress;

    public function __construct()
    {
        $this->url = config('holaplex.url');
        $this->key = config('holaplex.key');
        $this->receiverAddress = config('holaplex.receiver_address');
    }

    public function getAssets($mintId)
    {
        $url = "{$this->url}/?api-key={$this->key}";

        $body = [
            'jsonrpc' => '2.0',
            'id' => $mintId,
            'method' => 'getAsset',
            'params' => [
                'id' => $this->receiverAddress
            ]
        ];

        $response = (new CurlRequest($this->url, $this->key, 'POST', json_encode($body)))->sendRequest();
        return $response;
    }
}
