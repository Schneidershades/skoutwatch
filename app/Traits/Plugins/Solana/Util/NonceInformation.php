<?php

namespace App\Traits\Plugins\Solana\Util;

use App\Traits\Plugins\Solana\TransactionInstruction;

class NonceInformation
{
    public string $nonce;
    public TransactionInstruction $nonceInstruction;

    public function __construct(string $nonce, TransactionInstruction $nonceInstruction)
    {
        $this->nonce = $nonce;
        $this->nonceInstruction = $nonceInstruction;
    }
}
