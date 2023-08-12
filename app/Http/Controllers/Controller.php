<?php

namespace App\Http\Controllers;

use App\Traits\Api\ApiResponder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Tag(
 *     name="SkoutWatch backend team",
 *     description="(Schneider Shades Komolafe - Overseer)"
 * )
 *
 * @OA\Info(
 *     version="1.0",
 *     title="SkoutWatch App OpenApi API Documentation",
 *     description="SkoutWatch App Using L5 Swagger OpenApi description",
 *
 *     @OA\Contact(email="schneidershades@gmail.com")
 * )
 *
 * @OA\Server(
 *     url="http://skoutwatchapi.test",
 *     description="Local API server"
 * )
 * * @OA\Server(
 *     url="https://dev-api.skoutwatch.com",
 *     description="Staging API server"
 * )
 * @OA\Server(
 *     url="https://staging.skoutwatch.com",
 *     description="Staging API server"
 * )
 * @OA\Server(
 *     url="https://api.skoutwatch.com",
 *     description="Live API server"
 * )
 *
 *  @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ApiResponder;
}
