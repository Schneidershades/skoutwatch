<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreDocumentVerificationFormRequest;
use App\Models\User;
use App\Services\DocumentService;

class DocumentVerificationController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/v1/user/document/verify",
     *      operationId="userVerifyDocumentViaOTP",
     *      tags={"OTP"},
     *      summary="Profile of a registered user",
     *      description="Profile of a registered user",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/StoreDocumentVerificationFormRequest")
     *      ),
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
    public function store(StoreDocumentVerificationFormRequest $request)
    {
        $findUser = (new DocumentService())->userByDocumentIdAndEmaiIncludingOwner($request['email'], $request['document_id']);

        if (! $findUser) {
            return $this->errorResponse('You are not a participant in this document', 401);
        }

        if (! $token = auth('api')->attempt(['email' => strtolower($request['email']), 'password' => $request['password']])) {
            return $this->authErrorResponse('Invalid email or password', 401);
        }

        User::find(auth('api')->user()->id)->update([
            'user_access_code' => null,
            'registration_mode' => null,
        ]);

        return $this->respondWithToken($token);
    }
}
