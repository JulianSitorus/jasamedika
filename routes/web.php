<?php

use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'login_post'])->name(  'login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_post'])->name('register.post');

Route::get('dashboard', [MobilController::class, 'index'])->name('user.dashboard');

Route::get('/create', [MobilController::class, 'create'])->name('mobil.create');
Route::post('/create/store', [MobilController::class, 'store'])->name('mobil.store');

Route::get('/{id}/rent', [AuthController::class, 'rent'])->name('rent');
