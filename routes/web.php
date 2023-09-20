<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ModsController;
use App\Http\Controllers\RoomController;
use App\Livewire\Chat;
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
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/logout', function(){
        return back();
    });
    Route::get('/', [RoomController::class, 'index'])->name('home');
    Route::get('/chat/messages/{Room}', [ChatController::class, 'showMessages']);
    Route::get('/chat/{Room}', Chat::class);

    Route::get('/join/{Room}', [RoomController::class, 'wantJoin']);

    Route::post('/del', [ChatController::class, 'deleteMessage']);
    Route::post('/edit', [ChatController::class, 'editMessage']);
    Route::post('/change', [ChatController::class, 'editProfile']);
    Route::post('/report', [ChatController::class, 'report']);
    Route::post('/createRoom', [RoomController::class, 'createRoom']);
    Route::post('/joinRoom', [RoomController::class, 'joinRoom']);


    Route::middleware('role:moderator,admin')->group(function () {
        Route::get('/mods', [ModsController::class, 'index']);
    });
});
