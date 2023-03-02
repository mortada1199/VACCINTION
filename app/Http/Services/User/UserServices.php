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

    public function login($request)
    {
        $user = User::where('email', $request->email)->Where('password', $request->password)->first();
        if ($user == null) {
            return null;
        }
        return $user;
    }

    public function updateuser($request, $id)
    {

        $user  = User::where('id', $id)->first();
        if ($user != null) {
            $user->update([
                'name' => $request->name ?? $user->name,
                'password' => $request->password ?? $user->password,
                'email' => $request->email ?? $user->email,
                'phone' => $request->phone ?? $user->phone,
                'date' => $request->date ?? $user->date
            ]);
            return $user;
        }
    }

    public function getAllData()
    {
        $user  = User::all();
        return $user;
    }
}
