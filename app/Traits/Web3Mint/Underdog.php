<?php

namespace App\Traits\Web3Mint;

class Underdog
{
    public function __construct(public $url = null, public $projectId = null)
    {
        $this->url = config('underdog.url');
        $this->projectId = config('underdog.project_id');
    }

    public function createNfts($user)
    {
        $content = [
            'name' => $user['first_name'] .' '.$user['last_name'],
            'symbol' => "SK",
            'description' => "this process will mint the attributes of ". $user['first_name'] .' '.$user['last_name'],
            'image' => "https://skoutwatch.com/img/2asset%203%201.png",
            'externalUrl' => 'N/A',
            'receiverAddress' => config('underdog.receiver_address'),
            'upsert' => true,
            'delegated' => true,
            'attributes' =>  ((object)$user['attributes'][0])
        ];

        return $response = $this->sendRequest("{$this->url}/v2/projects/c/{$this->projectId}/nfts", 'POST', json_encode($content));

        return $errorArray = json_decode($response->message, true);
    }

    public function searchNfts()
    {
        return $this->sendRequest("{$this->url}/v2/projects/{$this->projectId}/nfts/search?page=1&limit=10", 'GET', []);
    }

    public function getAllNfts($transaction)
    {
        return $this->sendRequest("{$this->url}/v2/projects/{$this->projectId}/nfts?page=1&limit=10", 'GET', []);
    }

    public function getNftsById($id)
    {
        return $this->sendRequest("{$this->url}/v2/projects/{$this->projectId}/nfts/$id", 'GET', []);
    }

    public function updateNftsById($user, $id)
    {
        $content = [
            'description' => $user->description,
            'image' => $user->image,
            'externalUrl' => 'N/A',
            'receiverAddress' => config('underdog.receiver_address'),
            'attributes' => []
        ];

        return $this->sendRequest("{$this->url}/v2/projects/{$this->projectId}/nfts/$id", 'PUT', json_encode($content));

    }

    public function updatePartialNftsById($user, $id)
    {
        $content = [
            'description' => $user->description,
            'image' => $user->image,
            'externalUrl' => 'N/A',
            'receiverAddress' => config('underdog.receiver_address'),
            'attributes' => []
        ];

        return $this->sendRequest("{$this->url}/v2/projects/{$this->projectId}/nfts/$id", 'PATCH', json_encode($content));

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
                'Authorization: Bearer '.config('underdog.key'),
            ],
        ]);

        $response = curl_exec($curl);

        return json_decode($response);
    }
}
