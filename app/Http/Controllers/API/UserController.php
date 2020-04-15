<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidation;
use App\Http\Resources\ServerCollection;
use App\Http\Resources\ServerResource;
use App\Repositories\ServerRepositoryInterface;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    private $server_repo;

    /**
     * UserController constructor.
     * @param $server_repo
     */
    public function __construct(ServerRepositoryInterface $server_repo)
    {
        $this->server_repo = $server_repo;
    }

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
//        $credentials = $request->only('email', 'password');
//
//        try {
//            if (!$token = JWTAuth::attempt($credentials)) {
//                return response()->json(['error' => 'invalid_credentials'], 400);
//            }
//        } catch (JWTException $e) {
//            return response()->json(['error' => 'could_not_create_token'], 500);
//        }
//
//        $user = User::where('email', request(['email']))->first();
//        $user->image;
//
//        return response()->json([
//            'token' => $token,
//            'expiration' => time(),
//            'user' => $user
//        ]);
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
     *         name="username",
     *         in="formData",
     *         type="string",
     *         description="Username",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         type="string",
     *         description="Email",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         type="string",
     *         description="Neznam123!@",
     *         required=true,
     *     ),
     *
     * @SWG\Parameter(
     *         name="password_confirmation",
     *         in="formData",
     *         type="string",
     *         description="Neznam123!@",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="pin_code",
     *         in="formData",
     *         type="string",
     *         description="Pin code",
     *         required=true,
     *     ),
     * @SWG\Parameter(
     *         name="country",
     *         in="formData",
     *         type="string",
     *         description="Country",
     *         required=true,
     *     ),
     * @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     * @SWG\Response(
     *          response=404,
     *          description="Api Not found!"
     *       ),
     *     )
     * @param UserValidation $request
     * @return JsonResponse
     */
    public function register(UserValidation $request)
    {
//        $user = User::create([
//            'first_name' => $request->get('first_name'),
//            'last_name' => $request->get('last_name'),
//            'username' => $request->get('username'),
//            'email' => $request->get('email'),
//            'password' => bcrypt($request->get('password')),
//            'pin_code' => $request->get('pin_code'),
//            'country' => $request->get('country'),
//            'status' => 0,
//            'ip_address' => $request->ip(),
//            'role_id' => 3
//        ]);


//        $data = array();
//        $data['email'] = $user->email;
//        $data['name'] = $user->first_name . '' . $user->last_name;
//        $data['first_name'] = $user->first_name;
//        $data['subject'] = 'Email confirmation';
//        send_email('email.registration', $data);
//        $token = JWTAuth::fromUser($user);
//        $user->role;
//        return response()->json([
//            'token' => $token,
//            'expiration' => time(),
//            'user' => $user
//        ]);
    }


    /**
     * @SWG\Post(
     *      path="/user/profile/update",
     *      summary="Update user profile",
     *      description="Update user profile",
     * @SWG\Parameter(
     *         name="first_name",
     *         in="formData",
     *         type="string",
     *         description="First name"
     *     ),
     * @SWG\Parameter(
     *         name="last_name",
     *         in="formData",
     *         type="string",
     *         description="Last name"
     *     ),
     * @SWG\Parameter(
     *         name="username",
     *         in="formData",
     *         type="string",
     *         description="Username"
     *     ),
     * @SWG\Parameter(
     *         name="email",
     *         in="formData",
     *         type="string",
     *         description="Email"
     *     ),
     * @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         type="string",
     *         description="Neznam123!@"
     *     ),
     *
     * @SWG\Parameter(
     *         name="pin_code",
     *         in="formData",
     *         type="string",
     *         description="Pin code"
     *     ),
     * @SWG\Parameter(
     *         name="country",
     *         in="formData",
     *         type="string",
     *         description="Country"
     *     ),
     * @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     * @SWG\Response(
     *          response=404,
     *          description="Api Not found!"
     *       ),
     *     )
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|max:30',
            'password' => 'sometimes|max:40',
            'country' => 'required|string|max:32',
            'pin_code' => 'sometimes|integer'
        ]);
        $user = auth()->user();

        $attributes = $request->except('image');
        if ($attributes['current_password'] != null && $attributes['new_password'] != null) {

            if(Hash::check($attributes['current_password'], $user->password)){
                $request->validate([
                    'new_password' => 'required|min:5'
                ]);
                $user->password = Hash::make($attributes['new_password']);
            }else{
                return response(['errors' => ['current_password' => ['Invalid password']]], 422);
            }
        }
        if ($request->hasFile('image')) {
            $alt = $attributes['first_name'] . ' ' . $attributes['last_name'];
            $image = saveImage($request->file('image'), $alt);
            if ($image) {
                $attributes['image_id'] = $image->id;
            }
        }
        $user->update($attributes);
        return response()->json(['message' => 'Successfully', 'user' => $user], 200);

    }

    /**
     * @SWG\Get(
     *      path="user/servers/all",
     *      summary="Get list of all user servers",
     *      description="Returns list of all servers",
     *      @SWG\Response(
     *          response=200,
     *          description="Success"
     *       ),
     *     )
     *
     * Display a listing of all servers.
     * @return AnonymousResourceCollection
     */
    public function getUserServers()
    {
        $user = auth()->user();
        ServerResource::withoutWrapping();
        return ServerResource::collection($this->server_repo->getUserServers($user->id));
    }
}
