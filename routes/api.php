<?php

use App\Http\Controllers\Api\DafAksesController;
use App\Http\Controllers\Api\DafSifatController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::apiResource('dafakses', DafAksesController::class)->parameters([
    'dafakses' => 'dafakses'
])->middleware('auth:sanctum');

Route::apiResource('dafsifat', DafSifatController::class)->parameters([
    'dafsifat' => 'dafsifat'
])->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)->parameters([
    'users' => 'user'
])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

