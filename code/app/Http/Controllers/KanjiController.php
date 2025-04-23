<?php

namespace App\Http\Controllers;

use App\Models\Kanji;
use Illuminate\Http\Request;


class KanjiController extends Controller
{
    function addKanji(Request $request){
        Kanji:: create([
            'kanji_character'=>$request->kanji_character,                                      
            'meaning'=>$request->meaning,
            'reading_on'=>$request->reading_on,
            'reading_kon'=>$request->reading_kon,
            'jlpt_level'=>$request->jlpt_level,
            'exemples'=>$request->exemples,
            'radical'=>$request->radical,
            'grade'=>$request->grade,
            'memory_trick'=>$request->memory_trick,
            'stroke_order'=>$request->stroke_order,
        ]);
        return redirect()->route('admin_dashboard');

                 
       

    }
}
