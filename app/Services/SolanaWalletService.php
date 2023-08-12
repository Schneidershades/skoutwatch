<?php

namespace App\Services;

use App\Models\User;
use App\Traits\Plugins\Solana\Account;
use App\Traits\Plugins\Solana\PublicKey;
use App\Traits\Plugins\Solana\Util\Buffer;
use Illuminate\Support\Facades\Crypt;

class SolanaWalletService
{
    public function __construct(public User $user){}

    public function createUserWallet()
    {
        $createWallet = new Account;

        return $this->user->update([
            'solana_public_key' => new PublicKey($createWallet->getPublicKey()),
            'solana_secret_key' => Crypt::encrypt(Buffer::from((new Account())->getSecretKey())->toArray()),
        ]);

    }
}
