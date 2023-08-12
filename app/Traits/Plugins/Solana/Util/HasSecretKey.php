<?php

namespace App\Traits\Plugins\Solana\Util;

interface HasSecretKey
{
    public function getSecretKey(): Buffer;
}
