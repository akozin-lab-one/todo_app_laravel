<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //loginPage
    public function loginPage(){
        return view('login');
    }

    //registerPage
    public function registerPage(){
        return view('register');
    }

    public function dashboard(){
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.mainpage');
        }else{
            return redirect()->route('user#main');
        }
    }
}
