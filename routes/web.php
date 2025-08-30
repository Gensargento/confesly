<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');
Route::get('/welcome', [UserController::class, 'showWelcome'])->name('welcome');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/user/register', [UserController::class, 'showRegister'])->name('register.show');
Route::post('/user/register', [UserController::class, 'register']);

Route::get('/user/login', function () {
    return Inertia::render('Login');
});
Route::post('/user/login', [UserController::class, 'login']);

Route::get('/dashboard', [MessageController::class, 'showDashboard'])->name('dashboard');
Route::get('/{username}/message', [MessageController::class, 'showMessageBox']);
Route::post('/{username}/message', [MessageController::class, 'sendMessage']);



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
