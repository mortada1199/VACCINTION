<?php

namespace App\Http\Services\User;

use App\Http\Requests\User\LoginRequest;
use App\Models\User;

class UserServices
{
    public static function store($request)
    {
        $user = User::create([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date
        ]);
        return $user;
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->Where('password', $request->password)->first();
        if ($user == null) {
            return null;
        }
        return $user;
    }
}
