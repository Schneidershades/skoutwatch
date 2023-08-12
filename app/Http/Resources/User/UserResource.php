<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'initials' => substr($this->first_name, 0, 1).''.substr($this->last_name, 0, 1),
            'email' => $this->email,
            'phone' => $this->phone,
            'bvn' => $this->system_verification ? '**********' : null,
            'image' => 'https://tonote-storage.s3.eu-west-3.amazonaws.com/'.$this->image,
            'gender' => $this->gender,
            'address' => $this->address,
            'country' => $this->country,
            'state' => $this->state,
            'city' => $this->city,
            'is_online' => $this->is_online ? true : false,
            'ip_address' => $this->ip_address,
            'identity_type' => $this->identity_type,
            'identity_number' => ($this->identity_type == 'nin' ? $this->nin : ($this->identity_type == 'bvn' ? $this->bvn : ($this->identity_type == 'drivers_license' ? $this->drivers_license_no : null))),
            'nin' => $this->system_verification ? '**********' : null,
            'drivers_license_no' => $this->system_verification ? '**********' : null,
            'dob' => $this->dob,
            'system_verification' => $this->system_verification ? true : false,
            'national_verification' => $this->national_verification ? true : false,
            'access_locker_documents' => $this->access_locker_documents ? true : false,
            'avatar' => $this->avatar != null ? $this->avatar->file_url : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_complete' => $this->is_complete,
            'is_business' => $this->is_business ? true : false,
            'solana_public_key' => $this->solana_public_key,
        ];
    }
}
