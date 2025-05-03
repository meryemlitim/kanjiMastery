<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\KanjiController;
use App\Http\Controllers\KanjiListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;






Route::get('/', function () {
    return view('home');
});
Route::middleware('auth', 'role:admin')->group(function (){

Route::get('/admin_dashboard',[AdminController::class, 'index'])->name('admin_dashboard');

// kanji 
Route::post('add_kanji',[KanjiController::class,'addKanji'])->name('add_kanji');

} );
Route::middleware('auth', 'role:user')->group(function (){

  Route::get('/user_dashboard',[UserController::class, 'index'])->name('user_dashboard');

    //  get kanji
   Route::get('/kanji/{character}',[KanjiController::class,'getKanji']);

   // save kanji
Route::post('/add_kanjiList', [KanjiListController::class, 'saveUserKanji'])->name('add_kanjiList');
Route::post('/Struggled_kanji', [KanjiListController::class, 'struggledKanjiMeaning'])->name('Struggled_kanji');
Route::post('/Struggled_kanji_reading', [KanjiListController::class, 'struggledKanjiReading'])->name('Struggled_kanji_reading');

// delete kanji from my list 

Route::delete('/deleteKanjiFromMyList',[KanjiListController::class, 'deleteKanji'])->name('deleteKanjiFromMyList');
} );
Route::get('/login',[AuthentificationController::class, 'login'])->name('login');
Route::get('/register',[AuthentificationController::class, 'register'])->name('signup');
Route::post('/signup_user',[AuthentificationController::class, 'sign_up'])->name('signup_user');
Route::post('/login_user',[AuthentificationController::class, 'log_in'])->name('login_user');
// Route::get('/dashboard');
Route::get('/logout', [AuthentificationController::class, 'logout'])->name('logout')->middleware('auth');



