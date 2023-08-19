<?php

namespace App\Http\Controllers\Api\Player;

use App\Models\User;
use App\Services\ProcessNftService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Player\StorePlayerAttributeFormRequest;

class PlayerController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/players",
     *      operationId="AllPlayer",
     *      tags={"Player"},
     *      summary="AllPlayer",
     *      description="Showing all player list",
     *
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
     *      security={ {"bearerAuth": {}} },
     * )
     */
    public function index()
    {
        return $this->showAll(User::where('role', 'Player')->get());
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
     *      security={ {"bearerAuth": {}} },
     * )
     */
    public function store(StorePlayerAttributeFormRequest $request)
    {
        $user = User::create($request->except('attributes'));

        return (new ProcessNftService())->playerProcess($user, $request);

    }

    public function show($id)
    {

    }

    public function update($id)
    {

    }
}
