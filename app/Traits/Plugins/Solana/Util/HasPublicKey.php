<?php

namespace App\Traits\Plugins\Solana\Util;

use App\Traits\Plugins\Solana\PublicKey;

interface HasPublicKey
{
    public function getPublicKey(): PublicKey;
}
