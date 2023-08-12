<?php

namespace App\Http\Controllers\Api\Solana;

use App\Http\Controllers\Controller;
use App\Traits\Plugins\Solana\Account;
use App\Traits\Plugins\Solana\Keypair;
use App\Traits\Plugins\Solana\Connection;
use App\Traits\Plugins\Solana\PublicKey;
use App\Traits\Plugins\Solana\SolanaRpcClient;
use App\Traits\Plugins\Solana\Util\Buffer;
use Tighten\SolanaPhpSdk\Util\Buffer as UtilBuffer;

class SolanaKeyController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/solana-wallet",
     *      operationId="wallet",
     *      tags={"wallet"},
     *      summary="Profile of a wallet user",
     *      description="Profile of a wallet user",
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful signin",
     *
     *          @OA\MediaType(
     *             mediaType="application/json",
     *         ),
     *       ),
     *
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     * )
     */
    public function index()
    {
        $client = new SolanaRpcClient(SolanaRpcClient::DEVNET_ENDPOINT);
        $connection = new Connection($client);
        $createWallet = new Keypair();
        $time =  ($createWallet->generate());
    }
}
