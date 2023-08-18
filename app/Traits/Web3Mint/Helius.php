<?php

namespace Api\Traits\Web3Mint;

use Api\Traits\Curl\CurlRequest;

class Helius
{
    public function __construct(private $url, private $projectId, private $key, private $receiver_address)
    {
        $this->receiver_address = config('helius.receiver_address');
        $this->url = config('helius.url');
        $this->projectId = config('helius.project_id');
        $this->key = config('helius.key');
    }

    public function getAssets($mintId)
    {
        $url = "{$this->url}/?api-key={$this->key}";

        $body = [
            'jsonrpc' => '2.0',
            'id' => $mintId,
            'method' => 'getAsset',
            'params' => [
                'id' => $this->receiver_address
            ]
        ];

        $response = (new CurlRequest($this->url, $this->key, 'POST', json_encode($body)))->sendRequest();
        return $response;
    }
}
