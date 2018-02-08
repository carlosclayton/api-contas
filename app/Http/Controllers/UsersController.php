<?php

namespace ApiContas\Http\Controllers;
use ApiContas\Http\Requests\UserSettingRequest;
use ApiContas\Repositories\UserRepository;

class UsersController extends Controller
{
    private $repository;

    function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->all();

        return response()->json(array(
            'data' => $users
        ));
    }

    public function updateSettings(UserSettingRequest $request){
        $data = $request->only('password');
        $this->repository->update($data,$request->user('api')->id);
        return $request->user('api');
    }

}


