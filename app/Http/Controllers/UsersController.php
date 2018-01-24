<?php

namespace ApiContas\Http\Controllers;

use ApiContas\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}


