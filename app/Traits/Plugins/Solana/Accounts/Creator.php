<?php

namespace App\Traits\Plugins\Solana\Accounts;

use App\Traits\Plugins\Solana\Borsh;

class Creator
{
    use Borsh\BorshDeserializable;

    public const SCHEMA = [
        self::class => [
            'kind' => 'struct',
            'fields' => [
                ['address', 'pubkeyAsString'],
                ['verified', 'u8'],
                ['share', 'u8'],
            ],
        ],
    ];
}
