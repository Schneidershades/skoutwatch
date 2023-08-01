<?php

namespace App\Traits\Payments;

class Credo
{
    public function initiate($transaction)
    {
        $baseUrl = 'https://api.credocentral.com'; $publishableKey = '0PUB0312poF5J29cruYr0ZO1tcAh6V0J';

        #insert your public key $data = array("amount" => 10000, #amount is in kobo "bearer" => 0, # who bears the fee; 0 = customer, 1 = merchant "callbackUrl" => "https://example.com/", "channels" => array("card", "bank"), "currency" => "NGN", "customerFirstName" => "John", "customerLastName" => "Wick", "customerPhoneNumber" => "2348032132100", "email" => "john.wick@credocentral.com", #metadata is any extra info you want to record with the transaction. "metadata" => array( "bankAccount" => "0114877128", "customFields" => array(array("variable_name" => "gender", "value" => "Male", "display_name" => "Gender"))), # "reference"=> "mTL022NzzQ0", #This must be Unique, if not present we will generate one", # "serviceCode"=> "201220045mG7mTL022zQ09" # If you have dynamic settlement service setup" ); $transaction = curl_init($baseUrl . "/transaction/initialize"); curl_setopt($transaction, CURLOPT_POST, true); curl_setopt($transaction, CURLOPT_POSTFIELDS, json_encode($data)); curl_setopt($transaction, CURLOPT_HTTPHEADER, [ "Authorization: " . $publishableKey, "Content-Type: application/json" ]); $response = curl_exec($transaction); curl_close($transaction); echo $response;
        $body = [
            'amount' => $transaction,
            'currency' => $transaction->currency,
            'redirectUrl' => 'http://myapp.com/orders/eyu67234ff/paymentComplete',
            'transRef' => $transaction->id,
            'paymentOptions' => 'CARD,BANK',
            'customerEmail' => 'cirochwukunle@example.com',
            'customerName' => 'Ciroma Chukwuma Adekunle',
            'customerPhoneNo' => '2348012345678',
            'customFields' => 'modelNo|0092453,serviceType|airtime',
        ];

        $response = $this->sendRequest('https://api.credocentral.com/credo-payment/v1/payments/initiate', 'POST', json_encode($body));
    }

    public function verify($reference)
    {
        $response = $this->sendRequest("https://api.credocentral.com/credo-payment/v1/transactions/$reference/verify", 'GET', []);

        if ($response->approvalStatus->name == 'Accepted') {
            return [
                'success' => true,
                'payment_gateway' => 'Credo',
                'payment_gateway_json_response' => json_encode($response),
                'payment_reference' => $reference,
                'payment_gateway_charge' => $response->customerCharge,
                'payment_gateway_message' => $response->paymentStatus->name,
                'payment_gateway_method' => $response->paymentChannel->name,
                'status' => 'Paid',
                'amount_paid' => $response->dueAmount->name / 100,
            ];
        } else {
            return [
                'success' => false,
                'payment_gateway' => 'Credo',
                'status' => 'Failed',
                'payment_gateway_json_response' => json_encode($response),
                'payment_gateway_message' => 'transaction failed on gateway',
            ];
        }

        // {
        //     "id": 4,
        //     "completedAt": "2021-01-28T12:35:43",
        //     "createdAt": "2021-01-28T12:35:43",
        //     "customerEmail": "cirochwukunle@example.com",
        //     "customerName": "Ciroma Chukwuma Adekunle",
        //     "customerPhoneNo": "2348012345678",
        //     "customerUuid": null,
        //     "date": "2021-01-28",
        //     "description": "Transaction",
        //     "dueAmount": 100,
        //     "merchantImsId": "154789685478965",
        //     "merchantReferenceNo": "254655-4946-3634",
        //     "processingFees": "1.5,",
        //     "customerCharge": "0.0,",
        //     "referenceNo": "order-URQiaJZRvd",
        //     "totalAmount": 101.5,
        //     "updatedAt": "2021-01-28T12:35:43",
        //     "approvalStatus": {
        //         "id": 2,
        //         "name": "Accepted"
        //     },
        //     "paymentChannel": {
        //         "id": 1,
        //         "name": "Card"
        //     },
        //     "paymentStatus": {
        //         "id": 5,
        //         "description": null,
        //         "name": "Successful"
        //     },
        //     "paymentOption": {
        //         "id": 1,
        //         "name": "Regular"
        //     }
        // }
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
                'Accept' => 'application/json',
                'Authorization: Bearer '.config('credo.secret_key'),
            ],
        ]);

        $response = curl_exec($curl);

        return json_decode($response);
    }
}
