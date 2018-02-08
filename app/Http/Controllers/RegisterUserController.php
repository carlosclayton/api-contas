<?php

namespace ApiContas\Http\Controllers;

use ApiContas\Repositories\UserRepository;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    private $respository;

    public function __construct(UserRepository $respository)
    {
        $this->respository = $respository;
    }

    public function store(Request $request){
        $token = $request->get('token');
        $facebook = \Socialite::driver('facebook');
        $userSocial = $facebook->userFromToken($token);
        $user = $this->respository->findByField('email', $userSocial->email)->first();
        if(!$user){
            \ApiContas\Models\User::unguard();
            $user = $this->respository->create([
                'name' => $userSocial->name,
                'email' => $userSocial->email,
                'role' => 1,
                'password' => bcrypt('123456')
            ]);
            \ApiContas\Models\User::reguard();
        }
        return ['token' => \Auth::guard('api')->tokenById($user->id)];
    }
}
