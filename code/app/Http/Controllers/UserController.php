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
            'memory_trick'=>$kanji->memory_trick,
            'kun_readings' => $kanji->reading_kon,
            'grade' => $kanji->grade ?? null

          ];

        });  
        $quizs=[];
        $quizs_reading=[];
         
       if(count($savedKanjis)>=4){
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
       }
        // get Struggled Kanji Meaning
        $getStruggledKanjiMeaning= $user->savedKanjis()->wherePivot('isStruggled_meaning','=',true)->get();
        $getStruggledKanjiReading= $user->savedKanjis()->wherePivot('isStruggled_reading','=',true)->get();
        $totalSavedKanji=count($savedKanjis);
        if($totalSavedKanji<=3){
          $countMasterdKanjiMeaning=0;
          $countMasterdKanjiReading=0;
          $progress=0;
          $msg='Good start! Keep learning.';
        }else{
          
              $countMasterdKanjiMeaning=count($savedKanjis)-count($getStruggledKanjiMeaning);
              $countMasterdKanjiReading=count($savedKanjis)-count($getStruggledKanjiReading);
              $progress = (int)( (($countMasterdKanjiMeaning + $countMasterdKanjiReading) * 100) / (2 * count($savedKanjis)) );
              // dd($progress);
              if ($progress === 100) {
                $msg = 'Bravo! All kanji mastered! 🎉';
            } elseif ($progress >= 67) {
                $msg = 'Almost done! Stay focused.';
            } elseif ($progress >= 34) {
                $msg = "You're making great progress!";
            } else {
                $msg = 'Good start! Keep learning.';
            }
            
              
           

        }
              

        return view('user-dashboard', compact('user','savedKanjis','flashcard','quizs','quizs_reading','getStruggledKanjiMeaning','progress','getStruggledKanjiReading','msg','totalSavedKanji','countMasterdKanjiMeaning','countMasterdKanjiReading'));
      }
}
