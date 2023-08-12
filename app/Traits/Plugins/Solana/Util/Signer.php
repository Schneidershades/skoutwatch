<?php

namespace App\Traits\Plugins\Solana\Util;

use App\Traits\Plugins\Solana\PublicKey;

class Signer implements HasPublicKey, HasSecretKey
{
    protected PublicKey $publicKey;
    protected Buffer $secretKey;

    public function __construct(PublicKey $publicKey, Buffer $secretKey)
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
    }

    public function getPublicKey(): PublicKey
    {
        return $this->publicKey;
    }

    public function getSecretKey(): Buffer
    {
        return $this->secretKey;
    }
}
