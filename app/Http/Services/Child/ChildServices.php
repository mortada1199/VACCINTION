<?php

namespace App\Http\Services\Child;

use App\Http\Requests\User\LoginRequest;
use App\Models\Child;

class ChildServices
{
    public static function store($request)
    {
        $child = Child::create([
            'name' => $request->name,
            'date' => $request->date,
            'gender' => $request->gender,

        ]);
        return $child;
    }


    public function updateChild($request, $id)
    {

        $child  = Child::where('id', $id)->first();
        if ($child != null) {
            $child->update([
                'name' => $request->name ?? $child->name,
                'date' => $request->password ?? $child->date,
                'gender' => $request->email ?? $child->emagenderil,
            ]);
            return $child;
        }
    }
    public function getAllData($request)
    {
        $child  = Child::all();
        return $child;
    }
}
