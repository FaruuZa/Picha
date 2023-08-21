<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\profileController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function(){ return view('chat.index'); })->name('home');
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::get('/profile/{User:name}', [profileController::class, 'index']);