<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FineController;





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

Route::get('/login', function() {
    return view('pages.auth.login');
})->name('login');

Route::get('/', function() {
    return view('pages.welcome');
})->name("welcome");


Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);


Route::middleware('auth')->group(function () {

    Route::get('/add', function() {
        return view('pages.editForm');
    });

    Route::get('/book/{id}', [BookController::class, 'show']) ;
    Route::get('/book', [BookController::class, 'getAllBooks']);
    Route::post('/addBook', [BookController::class, 'addBook']);
    Route::post('/delete', [BookController::class, 'deleteBook'])->name('vymaz');
    Route::get('/editbook/{id}', [BookController::class, 'editBook']);
    
    Route::get('/user/getName/{id}', [UserController::class, 'getUserById']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
    Route::post('/addComment', [CommentController::class, 'store'])->name('comment');
    Route::get('/getComments/{id}', [CommentController::class, 'getCommetsByBookId']);
    Route::get('/editComment/{id}', [CommentController::class, 'show']);
    Route::post('/editC/{id}', [CommentController::class, 'edit']);
    Route::post('/deleteC/{id}', [CommentController::class, 'deleteComment']);

    Route::get('/pozicky', [LoanController::class, 'getAll']);
    Route::post('/pozicaj', [LoanController::class, 'pozicajKnihu'])->name('pozicaj');

    Route::get('/pokuty', [FineController::class, 'show']);
    Route::get('/pokutuj/{user_id}', [FineController::class, 'formWithUserId']);
    Route::post('/createPokuta', [FineController::class, 'store'])->name('createFine');
    Route::get('/deleteFine/{id}', [FineController::class, 'destroy']);

    Route::get('/autor/{id}', [AutorController::class, 'getAutorById']);
    Route::get('/addAutor', function()  {
        return view('pages.editAutor');
    });
    Route::post('/addAutor', [AutorController::class, 'store']);
    Route::get('/autors', [AutorController::class, 'getAll']);
});


