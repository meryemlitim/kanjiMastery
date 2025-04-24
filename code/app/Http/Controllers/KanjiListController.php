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
}
