<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/auth', function () {
    return view('auth');
});

Route::post('/signup', [UserController::class, 'signup']);

Route::post('/signin', [UserController::class, 'signin']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/applications', function () {
    return view('applications');
});