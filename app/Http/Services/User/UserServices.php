<?php
namespace App\Http\Services\User;
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
}
