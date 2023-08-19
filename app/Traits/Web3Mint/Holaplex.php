<?php

namespace App\Traits\Web3Mint;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use App\Traits\Curl\CurlRequest;
use Softonic\GraphQL\ClientBuilder;
use Illuminate\Support\Facades\Http;

class Holaplex
{
    protected $url;
    protected $projectId;
    protected $key;
    protected $receiverAddress;
    protected $collectionId;

    public function __construct()
    {
        $this->url = config('holaplex.url');
        $this->projectId = config('holaplex.project_id');
        $this->key = config('holaplex.key');
        $this->receiverAddress = config('holaplex.receiver_address');
        $this->collectionId = config('holaplex.collection_id');
    }

    public function mintCollection($data)
    {
        $graphqlQuery = 'mutation MintToCollection($input: MintToCollectionInput!) {\n  mintToCollection(input: $input) {\n    collectionMint {\n      id\n      creationStatus\n      compressed\n    }\n  }\n}';


        $inputVariables = [
            "input" => [
                "collection" => $this->collectionId,
                "recipient" => $this->receiverAddress,
                "compressed" => true,
                "creators" => [
                    [
                        "address" => $this->receiverAddress,
                        "share" => 100,
                        "verified" => true
                    ]
                ],
                "metadataJson" => $data
            ]
        ];
        $body = [
            'query' => $graphqlQuery,
            'variables' => $inputVariables,
        ];

        $options = [
            'http' => [
                'header' => "Authorization: ory_at_X8f5V224hbT3cOvPtxUXdmKbR86FmVrcbcaX9abtjhU.z6UYhd9hwBx7xaf6qs7ZJlDXP6qVsHkF9krTQguuPyU\r\n" .
                            "Content-Type: application/json\r\n",
                'method' => 'POST',
                'content' => json_encode($body),
            ],
        ];

        $context = stream_context_create($options);
        return $response = file_get_contents('https://api.holaplex.com/graphql', false, $context);
    }

}
