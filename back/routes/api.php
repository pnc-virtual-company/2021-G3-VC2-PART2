<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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

//....................get User.............................

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

// ..................create User ..........................
Route::post('/users', [UserController::class, 'store']);

//....................User Signin............................

Route::post('/signin', [UserController::class, 'signin']);

// ................User signout ........................
Route::post('/signout',[UserController::class, 'signout']); 

Route::delete('/users/{id}',[UserController::class, 'destroy']);

//====================Public Route===============================

// Route::get('/users',[UserController::class, 'index']);
// Route::get('/users/{id}',[UserController::class, 'store']);

// //====================Private Route========================
// Route::post('/users',[UserController::class, 'store']);
// Route::put('/users/{id}',[UserController::class, 'update']);

