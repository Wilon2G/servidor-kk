<?php

use App\Http\Controllers\AddBookController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentedBooksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class,"index"])->name("index");

Route::get('/login', [LoginController::class,"index"])->name("login");

Route::post('/login/validation', [LoginController::class,"validation"])->name("login.validation");

Route::get('/logOut', [LogoutController::class,"index"])->name("logOut");

Route::get('/rentedBooks', [RentedBooksController::class,"index"])->name("rentedBooks");

Route::get('/rentBook/{id}', [RentedBooksController::class,"rentBook"])->name("rentBook");



Route::get('/addBook', [AddBookController::class,"index"])->name("addBook");

Route::post('/addBook/validation', [AddBookController::class,"validation"])->name("addBook.validation");

Route::get('/register', [RegisterController::class,"index"])->name("register");
