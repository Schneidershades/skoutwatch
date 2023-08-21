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
        $this->url = config('helius.mainnet_url');
        $this->key = config('helius.key');
        $this->receiverAddress = config('helius.receiver_address');
    }

    public function getAssets($mintId)
    {
        $url = "https://api.mainnet-beta.solana.com";

        $body = [
            'jsonrpc' => '2.0',
            'id' => 'FZoDJXPLUA6cHi4So8i2MRkULcrSHbeieuCAvhUrsj8g',
            'method' => 'getAsset',
            'params' => [
                'id' => $mintId
            ]
        ];

        $response = (new CurlRequest($url, $this->key, 'POST', json_encode($body)))->sendRequest();
        return $response;
    }
}
