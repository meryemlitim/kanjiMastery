<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use session;
use Hash;

class AuthentificationController extends Controller
{
    public function register(Request $request){
      
        return view("auth.sign-up");
    }

    public function login(){
        return view("auth.log-in");

    }   
    public function sign_up(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required |email|unique:users',
            'password'=>'required|max:12|min:8',
        ]);     
        $user=new User();
        $user->name=$request->name;                      
        $user->email=$request->email;                      
        $user->password=$request->password;   
        $res=$user->save();
        if($res){
            return back()->with('success','you have registered');
        } else{
            return back()->with('fail','something wrong');
        }                  
         return redirect(view("auth.log-in"));
    }
    public function log_in(Request $request){
        $request->validate([
            'email'=>'required |email',
            'password'=>'required|max:12|min:8',
        ]);  
        $user= User::where('email','=',$request->email)->first();
        if($user){

         if(hash::check($request->password,$user->password)){
            $request->session()->put('loginId',$user->id);
            return view('user-dashboard',['user'=>$user]); 


         }else{ 
            return back()->with('fail','password incorrect');

         }

        }else{ 
            return back()->with('fail','this email is not registered');

        }
        
    }

    public function logout(Request $request)
{
    if ($request->session()->has('loginId')) {
        $request->session()->pull('loginId');
    }
    return redirect('/')->with('success', 'You have logged out successfully.');
}

}  
