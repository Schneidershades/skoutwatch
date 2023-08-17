<?php

namespace App\Http\Controllers\Api\Attribute;

use App\Models\Attribute;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/attributes",
     *      operationId="attributes",
     *      tags={"Attributes"},
     *      summary="Attributes of a user",
     *      description="Attributes of a user",
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
     *      security={ {"bearerAuth": {}} },
     * )
     */

    public function index()
    {
        return $this->showAll(Attribute::all());
    }

}
