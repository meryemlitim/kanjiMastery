<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\KanjiController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('home');
});
Route::get('/admin_dashboard',[AdminController::class, 'index'])->name('admin_dashboard');
Route::get('/login',[AuthentificationController::class, 'login']);
Route::get('/register',[AuthentificationController::class, 'register']);
Route::post('/signup_user',[AuthentificationController::class, 'sign_up'])->name('signup_user');
Route::post('/login_user',[AuthentificationController::class, 'log_in'])->name('login_user');
// Route::get('/dashboard');
Route::get('/logout', [AuthentificationController::class, 'logout'])->name('logout');

// kanji 
Route::post('add_kanji',[KanjiController::class,'addKanji'])->name('add_kanji');