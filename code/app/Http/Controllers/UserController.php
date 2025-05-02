<?php

namespace App\Http\Controllers;

use App\Models\KanjiList;
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
            
            'id' => $kanji->id,
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
            'id'=>$flash['id'],
            'kanji'=>$flash['kanji'],
            'correctAnswer'=>$flash['meanings'],
            'options'=>$options,
            // 'isStruggled'=>'false'
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
            'id'=>$flash['id'],
            'kanji'=>$flash['kanji'],
            'correctAnswer'=>$flash['kun_readings'],
            'options'=>$reading_options
          ];


          $quizs_reading[]=$quiz_reading;

        }
        // get Struggled Kanji Meaning
        $getStruggledKanjiMeaning= $user->savedKanjis()->wherePivot('isStruggled_meaning','=',true)->get();
        $getStruggledKanjiReading= $user->savedKanjis()->wherePivot('isStruggled_reading','=',true)->get();
            // dd($getStruggledKanjiMeaning);    
            // $countMasterdKanji=count($savedKanjis)-count($getStruggledKanjiMeaning!);
            $countMasterdKanjiMeaning=count($savedKanjis)-count($getStruggledKanjiMeaning);
            $countMasterdKanjiReading=count($savedKanjis)-count($getStruggledKanjiReading);
            $progress=($countMasterdKanjiMeaning+$countMasterdKanjiReading)*100/count($savedKanjis);    
            
            $totalSavedKanji=count($savedKanjis);
            if($progress>=100){
              $msg='Bravo! All kanji mastered! 🎉';
            }
            if($progress>=67 && $progress<=99){
              $msg='Almost done! Stay focused.';
            }
            if($progress>=34 && $progress<=66){
              $msg="You're making great progress!";
            }
            if($progress<=33){
              $msg='Good start! Keep learning.';
            }
            if($progress==0){
              $msg="Let's begin your kanji journey!";
            }

        return view('user-dashboard', compact('user','savedKanjis','flashcard','quizs','quizs_reading','getStruggledKanjiMeaning','progress','getStruggledKanjiReading','msg','totalSavedKanji','countMasterdKanjiMeaning','countMasterdKanjiReading'));
      }
}
