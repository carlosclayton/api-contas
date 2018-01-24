<?php

namespace ApiContas\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function accessToken(Request $request){
        $this->validateLogin($request);
        $credentials = $this->credentials($request);

        if($token = \Auth::guard('api')->attempt($credentials)){
            return $this->sendLoginResponse($request,$token);
        }
        return $this->sendFailedLoginResponse($request);
    }
    protected function sendLoginResponse(Request $request, $token)
    {
        return ['token' => $token];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return response()->json([
            'error' => 'Erro de credenciais'
        ], 400);
    }

    public function logout(Request $request)
    {
        \Auth::guard('api')->logout();
        return response()->json([], 204);
    }

    public function refreshToken(Request $request){
        $token = \Auth::guard('api')->refresh();
        return $this->sendLoginResponse($request, $token);
    }

    public function user(Request $request){
        $user = \Auth::guard('api')->user();
        return $user;
    }
}
