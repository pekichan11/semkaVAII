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

Route::get('/', function () {
    return view('master');
});

Route::get('register', function() {
    return view('auth.register');
})->name("register");

Route::post('register', [AuthController::class, 'store']);
Route::get('login', function() {
    return view('auth.login');
})->name('login');

Route::post('login', [AuthController::class, 'login']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/book/{id}', [BookController::class, 'show']) ;
    Route::get('/book', [BookController::class, 'getAllBooks']);
    Route::get('/books', [BookController::class, 'addBook']);
    Route::get('/delete/{id}', [BookController::class, 'deleteBook']);
});


