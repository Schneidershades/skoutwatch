<?php

namespace App\Http\Controllers\Api\Attribute;

use App\Http\Controllers\Controller;
use App\Models\AttributeCategory;

class AttributeCategoryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/attribute-category",
     *      operationId="attribute category",
     *      tags={"Attributes"},
     *      summary="Attributes category of a user",
     *      description="Attributes category of a user",
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
        return AttributeCategory::all();
    }
}
