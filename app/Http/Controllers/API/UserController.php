<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidation;
use App\Role;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class UserController extends Controller
{

    /**
     * @SWG\Post(
     *      path="/login",
     *      summary="Login with jwt",
     *      description="Returns jwt and all user data",
     *     @SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         type="string",
     *         description="The email for login",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         type="string",
     *         description="The password for login",
     *         required=true,
     *     ),
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * Login with jwt.
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', request(['email']))->first();

        return response()->json([
            'token' => $token,
            'expiration' => time(),
            'user' => $user
        ]);
    }

    /**
     *
     * @SWG\Get(
     *      path="/user",
     *      summary="Get authenticated user",
     *      description="Returns authenticated user",
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     * Get authenticated user.
     * @return JsonResponse
     */
    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}