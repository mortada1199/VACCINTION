<?php

namespace App\Http\Controllers;

use App\Http\Requests\Child\CreateChildRequest;
use App\Http\Requests\Child\UpdateChildRequest;
use App\Http\Services\Child\ChildServices;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChildController extends Controller
{
    protected    ChildServices $childservices;
    public function __construct(ChildServices $childservices)
    {
        $this->childservices = $childservices;
    }
    //this function use to crate user
    public function store(CreateChildRequest $request)
    {
        $child = $this->childservices->store($request);
        if ($child) {
            return response()->json([
                "statusCode" => "000", 'message' => 'created successfully', 'data' => $child
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Dosn't belong to any profile "
        ], 200);
    }



    public function Update(UpdateChildRequest $request, $id)
    {
        $child = $this->childservices->updateChild($request, $id);
        if ($child != null) {
            return response()->json([
                "statusCode" => "000", 'message' => 'Update successfully', 'data' => $child
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Dosn't Update "
        ], 200);
    }

    public function Get(Request $request)
    {
        $child = $this->childservices->getAllData($request);
        if ($child != null) {
            return response()->json([
                "statusCode" => "000", 'message' => ' successfully', 'data' => $child
            ], 200);
        }
        return response()->json([
            "statusCode" => "264", 'success' => false, 'message' => "User Not Found "
        ], 200);
    }
}
