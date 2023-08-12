<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthUpdateFormRequest;
use App\Http\Requests\Auth\UserLoginFormRequest;
use App\Http\Requests\Auth\UserRegistrationFormRequest;
use App\Models\DocumentUpload;
use App\Models\User;
use App\Services\DocumentConversionService;
use App\Services\SolanaWalletService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/v1/user/register",
     *      operationId="register",
     *      tags={"Authentication"},
     *      summary="Sign Up a new user",
     *      description="Returns a newly registered user data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UserRegistrationFormRequest")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successful signup",
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
    public function register(UserRegistrationFormRequest $request)
    {
        $user = User::create(($request->validated()));

        // event(new UserRegistered($user));

        (new SolanaWalletService($user))->createUserWallet();

        return $this->respondWithToken($user->createToken('MyApp')->plainTextToken);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/user/login",
     *      operationId="signIn",
     *      tags={"Authentication"},
     *      summary="Sign In a registered user",
     *      description="Returns a newly registered user data",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/UserLoginFormRequest")
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
     * )
     */
    public function login(UserLoginFormRequest $request)
    {
        $user = User::where('email', $request['email'])->firstOrFail();

        if (! $token = Auth::attempt(['email' => strtolower($request['email']), 'password' => $request['password']])) {
            return $this->authErrorResponse('Incorrect email or password', 401);
        }

        $user = User::find(auth('api')->user()->id);

        $user->update([
            'last_login_activity' => Carbon::now()->format('Y-m-d H:i:s'),
            'access_locker_documents' => false,
            'ip_address' => $request->ip(),
        ]);

        return $this->respondWithToken($user->createToken('MyApp')->plainTextToken);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/user/update",
     *      operationId="updateUserProfile",
     *      tags={"Authentication"},
     *      summary="Profile of a registered user",
     *      description="Profile of a registered user",
     *
     *      @OA\RequestBody(
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/AuthUpdateFormRequest")
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
    public function updateUser(AuthUpdateFormRequest $request)
    {
        $storeImageValue = $imageValue = null;

        $user = auth('api')->user();

        if ($request['image']) {
            $imageAttributes = 'data:image/jpg;base64,'.$request['image'];
            $imageValue = (new DocumentConversionService())->fileStorage($imageAttributes, $user);
            $storeImageValue = (new DocumentConversionService())->storeImage($imageValue['storage']);
        }

        $image = $storeImageValue ? ['image' => $storeImageValue] : [];

        $dataMerge = array_merge($request->except('image'), $image);

        User::find(auth('api')->user()->id)->update($dataMerge);

        return $this->showOne(User::find(auth('api')->user()->id), 201);

    }

    /**
     * @OA\Post(
     *      path="/api/v1/user/logout",
     *      operationId="userLogout",
     *      tags={"Authentication"},
     *      summary="Logout a registered user",
     *      description="Logout a registered user",
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
    public function logout()
    {
        auth('api')->logout();
    }

    /**
     * @OA\Get(
     *      path="/api/v1/user/profile",
     *      operationId="userProfile",
     *      tags={"Authentication"},
     *      summary="Profile of a registered user",
     *      description="Profile of a registered user",
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
    public function profile()
    {
        return $this->showOne((auth('api')->user()->id), 201);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/user/dashboard",
     *      operationId="userDashboard",
     *      tags={"Authentication"},
     *      summary="Dashboard of a registered user",
     *      description="Dashboard of a registered user",
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
    public function dashboard()
    {

        return $user = auth('api')->user();

        $userSignedPrints = $user->tools->whereNotNull('append_print_id')->pluck('document_upload_id')->toArray();

        $documentUploadIds = DocumentUpload::whereIn('id', $userSignedPrints)->select('name')->distinct()->count();

        $data = [
            'notary_request' => $user->activeTeam->team->envelopsSent->where('status', 'Paid')->count(),

            'complete_sessions' => $user->userScheduledSessions->where('end_session', true)->count(),

            'signed_notes' => $documentUploadIds,

            'received_notes' => $user->documentParticipants->where('who_added_id', '!=', $user->id)->count(),

            'completed_notes' => $user->activeTeam->team->documents->where('status', 'Completed')->count(),
        ];

        return $this->showMessage($data);
    }
}
