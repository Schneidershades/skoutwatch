<?php

namespace App\Traits\Web3Mint;

use GraphQL\GraphQL;

class Holaplex
{
    public function __construct(private $url, private $projectId, private $key)
    {
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
                "project" => "<PROJECT_ID>",
                "blockchain" => "SOLANA",
                "creators" => [
                    [
                        "address" => "<CREATOR_WALLET_ADDRESS>",
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


        return $this->sendRequest("https://api.holaplex.com/graphql", 'POST', json_encode($body));

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

        return $this->sendRequest("https://api.holaplex.com/graphql", 'POST', json_encode($body));

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

        return $this->sendRequest("https://api.holaplex.com/graphql", 'POST', json_encode($body));

    }

    private function sendRequest($url, $requestType, $postfields = [])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requestType,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer '.config('holaplex.key'),
            ],
        ]);

        $response = curl_exec($curl);

        return json_decode($response);
    }
}
