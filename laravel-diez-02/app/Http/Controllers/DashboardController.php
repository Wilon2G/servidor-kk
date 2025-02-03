<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if ($this->userIsLogged()) {
            return view("layout.main",["username"=>session('user')['username']]);
        }

        return view("layout.main",["username"=>"User"]);

    }

    public function userIsLogged(){
        return session()->has('user');
    }
}
