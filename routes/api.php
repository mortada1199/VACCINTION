<?php

use App\Http\Controllers\ChildController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//userr route 

    Route::post('auth/login', [UserController::class, 'Login']);
    Route::post('auth/register', [UserController::class, 'store']);
    Route::put('auth/update/{id}', [UserController::class, 'Update']);

    // child route

    Route::post('child/register', [ChildController::class, 'store']);
    Route::put('child/update/{id}', [ChildController::class, 'Update']);
    Route::get('child/getallchlidren', [ChildController::class, 'Get']);


