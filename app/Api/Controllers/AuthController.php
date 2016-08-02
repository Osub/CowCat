<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\Api\Controllers\BasicController;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTFactory;

class AuthController extends BasicController
{
    public function authenticate(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        \Log::info( $request->get('email') . '  登录系统并获取token: ' . $token );
        return response()->json(compact('token'));
    }

    public function userRegister(Request $request)
    {
        $newApplication = [
            'email' => $request->get('email'),
            'name'  => $request->get('appid'),
            'password'=> $request->get('appsecrite')
        ];

        $user = User::create($newApplication);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact( 'token' ));
    }

    public function appRegister(Request $request)
    {
        $customClaims = [
            'appid'=>$request->get('appid'),
            'appsecrite'=>$request->get('appsecrite')
        ];
        $playload = JWTFactory::make($customClaims);
        $token = JWTAuth::encode($playload);
        dd($token);
        $t = $token->get();
        return response()->json(compact( 't' ));
    }
}