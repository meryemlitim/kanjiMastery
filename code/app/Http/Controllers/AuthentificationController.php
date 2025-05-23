<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;

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
            return redirect()->route('login');
        } else{
            return back()->with('fail','something wrong');
        }                  
    }
    public function log_in(Request $request){
        $request->validate([
            'email'=>'required |email',
            'password'=>'required|max:12|min:8',
        ]);  
        $user= User::where('email','=',$request->email)->first();
        if($user){

         if(hash::check($request->password,$user->password)){
            if($user->role=='user'){
                Auth::login($user);

                $request->session()->put('loginId',$user->id);

                return redirect()->route('user_dashboard');

            }else{
                $request->session()->put('loginId',$user->id);
                Auth::login($user);
                return redirect()->route('admin_dashboard');
            }

         }else{ 
            return back()->with('fail','password incorrect');

         }

        }else{ 
            return back()->with('fail','this email is not registered');

        }
        
    }

//     public function logout(Request $request)
// {
//     if ($request->session()->has('loginId')) {
//         $request->session()->pull('loginId');
//     }
//     return redirect('/')->with('success', 'You have logged out successfully.');
// }
public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}  
