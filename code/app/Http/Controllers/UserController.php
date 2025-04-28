<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index(){
                   
        $user= Auth::user();
        $savedKanjis = $user->savedKanjis;
        // dd($savedKanjis);

        $flashcard=$savedKanjis->map(function($kanji){
          return[
            
            'kanji' => $kanji->kanji_character,
            'jlpt' => $kanji->jlpt_level,
            'meanings' => explode(',', $kanji->meaning),
            'on_readings' => explode(',', $kanji->reading_on),
            'kun_readings' => explode(',', $kanji->reading_kon),
            'grade' => $kanji->grade ?? null

          ];

        });  
        $quizs=[];

        foreach($flashcard as $flash){
          $otherMinings=$flashcard->where('kanji','!=',$flash['kanji'])->pluck('meanings')->flatten()->random(3)->toArray();
          $correctOption=$flash['meanings'];
          $options=$otherMinings;
          $options[]=$correctOption[0];
          shuffle($options);
         
          $quiz=[
            'kanji'=>$flash['kanji'],
            'correctAnswer'=>$flash['meanings'],
            'options'=>$options
          ];
         
          
$quizs[]=$quiz;
        }
      // dd($quizs);
      
        return view('user-dashboard', compact('user','savedKanjis','flashcard','quizs'));
      }
}
