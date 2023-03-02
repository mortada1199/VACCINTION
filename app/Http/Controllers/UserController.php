<?php

namespace App\Http\Controllers;

use App\Http\Services\User\UserServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategroyRequests\Categroy\CreateUserRequest;

class UserController extends Controller
{
   
    
    protected    UserServices $userService;
        public function __construct(UserServices $userService)
        {
            $this->userService = $userService;
        }
        public function store(CreateUserRequest $request)
        {    
            $user = $this->userService->store($request);
            if ($user) {
                return response()->json([
         "statusCode" => "000",'message' => 'created successfully','data' => $user  ], 200);
            }
            return response()->json([
        "statusCode" => "264", 'success' => false, 'message' => "User Dosn't belong to any profile " ], 200);
        }
    
}


