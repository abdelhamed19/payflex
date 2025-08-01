<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocketController;
use App\Http\Controllers\Api\AuthController;

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


Route::middleware(['auth:sanctum'])->group(function () {

});

Route::post('/sign-in', [AuthController::class, 'signIn'])
    ->name('api.login')
    ->middleware(['guest','role-login']);
Route::post('/register', [AuthController::class, 'signUp']);
Route::get('admin/socket',[SocketController::class,'index']);
