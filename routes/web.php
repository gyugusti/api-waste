<?php
use Dedoc\Scramble\Scramble;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [\App\Http\Controllers\Api\UserController::class, 'index']);

Scramble::registerUiRoute('doc/api');

