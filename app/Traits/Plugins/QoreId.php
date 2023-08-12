<?php

namespace App\Traits\Plugins;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class QoreId
{
    public function verifyUser($user, $request)
    {
        Log::info($user->dob);

        $request_body = [
            'firstname' => config('verifyme.api_mode') == 'live' ? $user->first_name : 'John',
            'lastname' => config('verifyme.api_mode') == 'live' ? $user->last_name : 'Doe',
            // 'dob' => config('verifyme.api_mode') == 'live' ? Carbon::parse($user->dob)->format('DD-MM-YY') : '04-04-1944',
        ];

        $bvn = config('verifyme.api_mode') == 'live' ? (int) $request['value'] : 10000000001;

        Log::info(config('verifyme.api_mode'));

        $res = $this->sendRequest('https://vapi.verifyme.ng/v1/verifications/identities/bvn/'.$bvn, 'POST', json_encode($request_body));

        return $res;
    }

    public function verifyUserVNIN($user, $request)
    {
        $request_body = [
            'firstname' => config('verifyme.api_mode') == 'live' ? $user->first_name : 'John',
            'lastname' => config('verifyme.api_mode') == 'live' ? $user->last_name : 'Doe',
            // 'dob' => config('verifyme.api_mode') == 'live' ? Carbon::parse($user->dob)->format('DD-MM-YY') : '04-04-1944',
        ];

        $nin = config('verifyme.api_mode') == 'live' ? (int) $request['value'] : 'JZ426633988976CH';

        return $this->sendRequest('https://vapi.verifyme.ng/v1/verifications/identities/virtual-nin/'.$nin, 'POST', json_encode($request_body));
    }

    public function verifyUserNIN($user, $request)
    {
        $request_body = [
            'firstname' => config('verifyme.api_mode') == 'live' ? $user->first_name : 'John',
            'lastname' => config('verifyme.api_mode') == 'live' ? $user->last_name : 'Doe',
            // 'dob' => config('verifyme.api_mode') == 'live' ? Carbon::parse($user->dob)->format('DD-MM-YY') : '04-04-1944',
        ];

        $nin = config('verifyme.api_mode') == 'live' ? (int) $request['value'] : 10000000001;

        return $this->sendRequest('https://vapi.verifyme.ng/v1/verifications/identities/nin/'.$nin, 'POST', json_encode($request_body));
    }

    public function verifyCompany($company)
    {
        $request_body = [
            'type' => config('verifyme.api_mode') == 'live' ? Str::slug($company['type'], '_') : Str::slug($company['type'], '_'),
            'rcNumber' => config('verifyme.api_mode') == 'live' ? (int) $company['registration_company_number'] : 11000011,
        ];

        return $this->sendRequest('https://vapi.verifyme.ng/v1/verifications/identities/cac', 'POST', json_encode($request_body));
    }

    public function verifyUserDriverLicense($user, $request)
    {
        $request_body = [
            'firstname' => config('verifyme.api_mode') == 'live' ? $user->first_name : 'John',
            'lastname' => config('verifyme.api_mode') == 'live' ? $user->last_name : 'Doe',
            'phone' => config('verifyme.api_mode') == 'live' ? $user->phone : '080000000000',
            'dob' => config('verifyme.api_mode') == 'live' ? $user->dob : '04-04-1944',
        ];

        $drivers_license = config('verifyme.api_mode') == 'live' ? (int) $request['value'] : 10000000001;

        return $this->sendRequest("https://vapi.verifyme.ng/v1/verifications/identities/drivers_license/$drivers_license", 'POST', json_encode($request_body));
    }

    public function sendRequest($url, $requestType, $postfields = [])
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
                'Authorization: Bearer '.config('verifyme.secret_key'),
            ],
        ]);

        $response = curl_exec($curl);

        return json_decode($response);
    }
}
