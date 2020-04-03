<?php

namespace App\Http\Controllers\API\Auth;

use App\Exceptions\UserNotVerifiedException;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'username' => 'required|string|unique:users|max:30',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'pin_code' => 'integer',
            'country' => 'required|string|max:32',
        ]);

        $validatedData['password'] = bcrypt($request->get('password'));
        $validatedData['ip_address'] = $request->ip();

        $user = User::create($validatedData);

        $token = $user->createToken('authToken');

        return response([
            'user' => $user,
            'token' => $token->accessToken,
            'expiration' => strtotime($token->token->expires_at)
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws UserNotVerifiedException
     */
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($loginData)){
            throw ValidationException::withMessages([
                'message' => [trans('auth.failed')],
            ]);
        }

        if(!auth()->user()->email_verified_at){
            throw new UserNotVerifiedException;
        }


        $user = auth()->user();

        $token = $user->createToken('authToken');

//        if ($request->remember_me)
//            $token->expires_at = Carbon::now()->addWeeks(1);

        $user->image;

        return response([
            'user' => $user,
            'token' => $token->accessToken,
            'expiration' => strtotime($token->token->expires_at)
//            'expiration' => Carbon::parse(
//                $token->token->expires_at
//            )->toDateTimeString()
        ]);
    }
}
