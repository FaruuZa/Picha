<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ModsController;
use App\Http\Controllers\RoomController;
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
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/', [RoomController::class, 'index']);
    Route::get('/chat/{Room}', [ChatController::class, 'index'])->name('home');
    Route::post('/chat/{Room}', [ChatController::class, 'sendMessage']);
    Route::get('/chat/messages/{Room}', [ChatController::class, 'showMessages']);

    Route::post('/del', [ChatController::class, 'deleteMessage']);
    Route::post('/edit', [ChatController::class, 'editMessage']);
    Route::post('/change', [ChatController::class, 'changePP']);
    Route::post('/report', [ChatController::class, 'report']);
    Route::get('/createRoom', function(){
        return view('chat.rooms');
    });
    Route::post('/createRoom', [RoomController::class, 'createRoom']);
    Route::get('/joinRoom', function(){
        return view('chat.joinRoom');
    });
    Route::post('/joinRoom', [RoomController::class, 'joinRoom']);

    Route::middleware('role:moderator,admin')->group(function () {
        Route::get('/mods', [ModsController::class, 'index']);
    });
});
