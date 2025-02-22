<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function index(){
        return view("login");
    }



    public function validation(){

        $validated = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);

        if (auth()->attempt($validated)) {

            request()->session()->regenerate();

            return redirect()->route("index")->with("success","Welcome back!");
        }

        return back()->withErrors(['login' => 'Email or password incorrect']);
    }


}
