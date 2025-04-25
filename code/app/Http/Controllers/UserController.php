<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
                   
        $user= Auth::user();
        $savedKanjis = $user->savedKanjis;
        $flashcardCard=$savedKanjis->map(function($kanji){
          return[
            
            'kanji' => $kanji->kanji_character,
            'jlpt' => $kanji->jlpt_level,
            'meanings' => explode(',', $kanji->meaning),
            'on_readings' => explode(',', $kanji->reading_on),
            'kun_readings' => explode(',', $kanji->reading_kon),
            'grade' => $kanji->grade ?? null

          ];

        });
      
        return view('user-dashboard', compact('user','savedKanjis','flashcardCard'));
      }
}
