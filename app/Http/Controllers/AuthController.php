<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    //
    function login(){
        return view('login');
       }
    
       function authenticating(Request $request){
        $angga = $request->validate([
            'email' => ['required'],
            'password'=> ['required'],
        ]);
        if (Auth::attempt($angga)){
            if(Auth::user()->role_id == 'admin'){
                return redirect('landing_page');
            }
            if(Auth::user()->role_id == 'alumni'){
                return redirect('profile');
            }
        }
        Session::flash('message', 'Login infalid');
        return redirect('/login');
       }
       function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
       }
}

