<?php

namespace App\Http\Controllers\Api\Assets;

use App\Models\AssetsMint;
use App\Models\PlayerMint;
use App\Traits\Web3Mint\Helius;
use App\Http\Controllers\Controller;

class AssetController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/assets?per_page={per_page}",
     *      operationId="AllAssets",
     *      tags={"Assets"},
     *      summary="AllAssets",
     *      description="Showing all Assets list",
     *      @OA\Parameter(
     *          name="per_page",
     *          description="per_page",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *              example="5"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful signin",
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
        foreach (PlayerMint::all() as $mint) {

            $assetResponse = (new Helius())->getAssets($mint->mint_id);

            return $assetResponse;

        }
    }


}
