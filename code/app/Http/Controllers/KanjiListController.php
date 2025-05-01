<?php

namespace App\Http\Controllers;
use App\Models\KanjiList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KanjiListController extends Controller
{
    public function saveUserKanji(Request $request)
    {
        
        $alreadySaved=KanjiList::where('kanji_id','=',$request->kanji_id)->where('user_id',Auth::user()->id)->exists();
      
       if(!$alreadySaved){
        KanjiList::create([
            'kanji_id'=>$request->kanji_id,
            'user_id'=>Auth::user()->id,

        ]);
       }
       
        return redirect()->route('user_dashboard');
    }
    public function struggledKanjiMeaning(Request $request){
        $id_string=$request->kanji_id;
        $id_array=explode(',',$id_string);
        
      KanjiList::whereIn('kanji_id',$id_array)->where('user_id',Auth::user()->id)->update(['isStruggled_meaning'=>true]);
      KanjiList::whereNotIn('kanji_id',$id_array)->where('user_id',Auth::user()->id)->update(['isStruggled_meaning'=>false]);
        

  
        return redirect()->route('user_dashboard');


    }

   
}

