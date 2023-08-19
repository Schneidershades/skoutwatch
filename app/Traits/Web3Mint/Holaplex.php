<?php

namespace App\Traits\Web3Mint;

use App\Traits\Curl\CurlRequest;

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
        $graphqlQuery = 'mutation MintToCollection($input: MintToCollectionInput!) {
            mintToCollection(input: $input) {
              collectionMint {
                id
                creationStatus
                compressed
              }
            }
          }';

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

        $response = (new CurlRequest($this->url, $this->key, 'POST', json_encode($body)))->sendRequest();

        if($response->data->mintToCollection->collectionMint->id == null){
            return [
                'success' => false,
                'mint_id' => null
            ];
        }else{
            return [
                'success' => true,
                'mint_id' => $response->data->mintToCollection->collectionMint->id
            ];
        }

    }

}
