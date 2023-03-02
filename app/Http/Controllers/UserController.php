<?php

namespace App\Http\Controllers;

use App\Http\Services\User\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UpdateUserRequest;
use GuzzleHttp\Psr7\Request;

class UserController extends Controller
{


    protected    UserServices $userService;
    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }
    //this function use to crate user
    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->store($request);
        if ($user) {
            return response()->json([
                "statusCode" => "000", 'message' => 'created successfully', 'data' => $user
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Dosn't belong to any profile "
        ], 200);
    }

    public function Login(LoginRequest $request)
    {
        $user = $this->userService->login($request);
        if ($user) {
            return response()->json([
                "statusCode" => "000", 'message' => 'Login successfully', 'data' => $user
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Dosn't Login "
        ], 200);
    }

    public function Update(UpdateUserRequest $request, $id)
    {
        $user = $this->userService->updateuser($request, $id);
        if ($user != null) {
            return response()->json([
                "statusCode" => "000", 'message' => 'Update successfully', 'data' => $user
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Dosn't Update "
        ], 200);
    }


    public function Get(Request $request)
    {
        $user = $this->userService->getAllData($request);
        if ($user != null) {
            return response()->json([
                "statusCode" => "000", 'message' => ' successfully', 'data' => $user
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Dosn't Update "
        ], 200);
    }
}
