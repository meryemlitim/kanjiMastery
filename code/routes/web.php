<?php

use App\Http\Controllers\AuthentificationController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('user-dashboard');
});
Route::get('/login',[AuthentificationController::class, 'login']);
Route::get('/register',[AuthentificationController::class, 'register']);
Route::post('/signup_user',[AuthentificationController::class, 'sign_up'])->name('signup_user');
Route::post('/login_user',[AuthentificationController::class, 'log_in'])->name('login_user');
// Route::get('/dashboard');
