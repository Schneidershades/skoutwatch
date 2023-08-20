<?php

namespace App\Http\Controllers\Api\Player;

use App\Models\User;
use App\Services\ProcessNftService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Player\StorePlayerAttributeFormRequest;
use App\Http\Resources\Player\PlayerResource;

class PlayerController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/players?per_page={per_page}",
     *      operationId="AllPlayer",
     *      tags={"Player"},
     *      summary="AllPlayer",
     *      description="Showing all player list",
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
        return PlayerResource::collection(User::all());
    }

    /**
     * @OA\Post(
     *      path="/api/v1/players",
     *      operationId="createPlayer",
     *      tags={"Player"},
     *      summary="createPlayer",
     *      description="create a player and attributes",
     *
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePlayerAttributeFormRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful signup",
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
    public function store(StorePlayerAttributeFormRequest $request)
    {
        $existingUser = User::where('email', $request['email'])->orWhere('nin', $request['nin'])->first();

        $user = $existingUser ? $existingUser : User::create($request->except('attributes'));

        return (new ProcessNftService())->playerProcess($user, $request);

    }
}
