<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(){

        if (!auth()->check()) {

            return redirect()->route("login")->withErrors(["LogIn"=>"You need to log in before you log out"]);
        }

        auth()->logout();

        return redirect()->route("index")->with("success","You've logged out, see you soon!");
    }
}
