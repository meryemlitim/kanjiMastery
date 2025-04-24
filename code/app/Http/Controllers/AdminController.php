<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
  function index(){

    $allKanji=Kanji::all();
    $user= Auth::user();
    $all_users= User::all();
    $user_number=User::count();
    $kanji_number=Kanji::count();

    return view('admin_dashboard', compact('allKanji','user','all_users','user_number','kanji_number'));
  }

}
