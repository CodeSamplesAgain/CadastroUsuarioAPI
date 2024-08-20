<?php

use App\Http\Controllers\Address\CepController;
use App\Http\Controllers\Address\CityController;
use App\Http\Controllers\Address\StateController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('new-password', [NewPasswordController::class, 'newPassword']);

Route::get('cep', [CepController::class, 'index']);
Route::get('states', [StateController::class, 'index']);
Route::get('cities', [CityController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('users', [UserController::class, 'index']);
});
