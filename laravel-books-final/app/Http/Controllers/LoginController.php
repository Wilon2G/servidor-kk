<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {



        return view("login");
    }

    public function validateLogin()
    {
        $email = request()->get("email", "");
        $password = request()->get("password", "");

        if (Auth::attempt(["email"=>$email,"password"=>$password])) {
            // Autenticación exitosa
            session()->regenerate();

            //dd($customer);

            return redirect()->route("index");
        }

        // Si falla la autenticación
        return back()->with("error","Incorrect user or password 😕");

    }


}
