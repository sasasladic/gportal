<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidation;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
     * @SWG\Post(
     *      path="/register",
     *      summary="Registration form",
     *      description="Registration form with cart",
     * @SWG\Parameter(
     *         name="first_name",
     *         in="formData",
     *         type="string",
     *         description="First name",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="last_name",
     *         in="formData",
     *         type="string",
     *         description="Last name",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="position",
     *         in="formData",
     *         type="string",
     *         description="Position",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         type="string",
     *         description="Email",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="cart",
     *         in="formData",
     *         type="string",
     *         description="Type: json. Example: {'cart':[{'id':'1','quantity':'2'}]} with double quotation marks",
     *         required=true,
     *     ),
     * @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     * @SWG\Response(
     *          response=404,
     *          description="Cart Not Found!"
     *       ),
     *     )
     * @param UserValidation $request
     * @return JsonResponse
     */
    public function register(UserValidation $request)
    {
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'pin_code' => $request->get('pin_code'),
            'country' => $request->get('country'),
            'status' => 0,
            'ip_address' => $request->ip(),
            'role_id' => 3
        ]);

//        $data = array();
//        $data['email'] = $user->email;
//        $data['name'] = $user->first_name . '' . $user->last_name;
//        $data['first_name'] = $user->first_name;
//        $data['subject'] = 'Email confirmation';
//        send_email('email.registration', $data);
        $token = JWTAuth::fromUser($user);

//        if ($request->get('cart')) {
//            $order_header = $this->storeOrderHeader($order_items = json_decode($request->get('cart'), true),
//                $request->ip(), $user);
//            if (!$order_header) {
//                return response()->json(['message' => 'Product Not Found!'], 404);
//            }
//            $order_header->user_id = $user->id;
//            $order_header->no = time();
//            $order_header->save();
//        } else {
//            return response()->json(['message' => 'Cart Not Found!'], 404);
//        }
        return response()->json(compact('user', 'token'), 201);
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