<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
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
    Route::get('/',[ChatController::class, 'index']);
    Route::post('/',[ChatController::class, 'sendMessage']);
    Route::post('/del',[ChatController::class, 'deleteMessage']);
    Route::post('/edit',[ChatController::class, 'editMessage']);
    Route::post('/change',[ChatController::class, 'changePP']);
    Route::post('/report',[ChatController::class, 'reported']);

});
