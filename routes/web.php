<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/dashboard', function () {
    return view('/dashboard');
});

// Routes for authentication 
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->middleware('guest');
    Route::post('/register', 'store')->middleware('guest');
});
Route::controller(SessionController::class)->group(function () {
    Route::get('/login', 'create')->middleware('guest');
    Route::post('/login', 'store')->middleware('guest');
});




// Routes for users
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('dashboard');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('users/store', 'store')->name('users.store');
    Route::get('/users/{user:id}/edit', 'edit')->name('users.edit');
    Route::post('/users/{user:id}/update', 'update')->name('users.update');
    Route::get('/users/{user:id}/delete', 'delete')->name('users.delete');
});
