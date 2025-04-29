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
            'kun_readings' => $kanji->reading_kon,
            'grade' => $kanji->grade ?? null

          ];

        });  
        $quizs=[];
        $quizs_reading=[];
         
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

        foreach($flashcard as $flash){
          $otherReadings= $flashcard->where('kanji','!=',$flash['kanji'])->pluck('kun_readings')->flatten()->random(3)->toArray();
          $correctReading=$flash['kun_readings'];
          $reading_options=$otherReadings;
          $reading_options[]=$correctReading;
          shuffle($reading_options);

          $quiz_reading=[
            'kanji'=>$flash['kanji'],
            'correctAnswer'=>$flash['kun_readings'],
            'options'=>$reading_options
          ];


          $quizs_reading[]=$quiz_reading;

        }
          // dd($quizs_reading);

                      
        return view('user-dashboard', compact('user','savedKanjis','flashcard','quizs','quizs_reading'));
      }
}
