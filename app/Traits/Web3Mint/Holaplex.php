<?php

namespace App\Traits\Web3Mint;

use Api\Traits\Curl\CurlRequest;

class Holaplex
{
    public function __construct(private $url, private $projectId, private $key, private $receiver_address)
    {
        $this->receiver_address = config('holaplex.receiver_address');
        $this->url = config('holaplex.url');
        $this->projectId = config('holaplex.project_id');
        $this->key = config('holaplex.key');
    }

    public function CreateCollection()
    {
        $graphqlQuery = 'mutation CreateCollection($input: CreateCollectionInput!) {
            createCollection(input: $input) {
                collection {
                    id
                    creationStatus
                }
            }
        }';

        $inputVariables = [
            "input" => [
                "project" => $this->projectId,
                "blockchain" => "SOLANA",
                "creators" => [
                    [
                        "address" => $this->receiver_address,
                        "share" => 100,
                        "verified" => false
                    ]
                ],
                "metadataJson" => [
                    "name" => "Collection name",
                    "symbol" => "SYMBOL",
                    "description" => "Collection description",
                    "image" => "<LINK_TO_IMAGE>",
                    "attributes" => []
                ]
            ]
        ];

        $body = ([
            'query' => $graphqlQuery,
            'variables' => $inputVariables,
        ]);

        $response = (new CurlRequest($this->url, $this->key, 'POST', json_encode($body)))->sendRequest();
        return $response;

    }
    public function getCollectionStatus()
    {
        $graphqlQuery = 'query GetCollectionStatus($project: UUID!, $collection:UUID!) {
            project(id: $project) {
                id
                name
                collection(id: $collection) {
                    id
                    creationStatus
                }
            }
        }';

        $inputVariables = [
            "project" => "<PROJECT_ID>",
            "collection" => "<COLLECTION_ID>"
        ];

        $body = ([
            'query' => $graphqlQuery,
            'variables' => $inputVariables,
        ]);

        $response = (new CurlRequest($this->url, $this->key, 'POST', json_encode($body)))->sendRequest();
        return $response;
    }

    public function mintCollection()
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
            'input' => [
            ]
        ];

        $body = ([
            'query' => $graphqlQuery,
            'variables' => $inputVariables,
        ]);

        $response = (new CurlRequest($this->url, $this->key, 'POST', json_encode($body)))->sendRequest();
        return $response;
    }
}
