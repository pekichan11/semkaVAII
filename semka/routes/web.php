<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/register', function() {
    return view('pages.auth.register');
})->name("register");

Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', function() {
    return view('pages.auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function() {
    return view('pages.welcome');
})->name("welcome");

Route::middleware('auth')->group(function () {
    Route::get('/book/{id}', [BookController::class, 'show']) ;
    Route::get('/book', [BookController::class, 'getAllBooks']);
    Route::post('/addBook', [BookController::class, 'addBook']);
    Route::get('/delete/{id}', [BookController::class, 'deleteBook'])->name('delete');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/editbook/{id}', [BookController::class, 'editBook']);
    Route::get('/add', function() {
        return view('pages.editForm');
    });
});


