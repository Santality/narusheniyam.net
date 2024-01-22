<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
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

Route::get('/applications', [ApplicationController::class,'AppList']);

Route::get('/application/create', function () {
    return view('applicationcreate');
});

Route::post('/application/appcreate', [ApplicationController::class, 'AppCreate']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/sort', [AdminController::class, 'sort']);

Route::get('/admin/confirm/{id}', [AdminController::class, 'confirm']);

Route::get('/admin/decline/{id}', [AdminController::class, 'decline']);

Route::get('/applications/sort', [ApplicationController::class,'AppSort']);

Route::get('/profile', function () {
    return view('profile');
});

Route::post('/update', [UserController::class, 'update']);
