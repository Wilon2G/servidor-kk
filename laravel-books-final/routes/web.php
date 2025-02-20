<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::middleware(["customer"])->get('/', [IndexController::class, "index"])->name('index');

Route::get('/login', [LoginController::class, "login"])->name('login');

Route::post('/login/validate', [LoginController::class, "validateLogin"])->name('login.validate');

Route::get('/register', [RegisterController::class, "register"])->name('register');

