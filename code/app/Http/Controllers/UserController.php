<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){

        $user= Auth::user();
        $savedKanjis = $user->savedKanjis;
    
        return view('user-dashboard', compact('user','savedKanjis'));
      }
}
