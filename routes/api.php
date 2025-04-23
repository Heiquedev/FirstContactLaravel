<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/house', function () {
    return response()->json(['sucess' => true, 'msg' => "Bem-vindo a minha primeira conexão com Laravel"], 200);
});
Route::post('/addUser', [UserController::class, 'store']);
Route::resource('/user', UserController::class);
