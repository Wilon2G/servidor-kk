<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function userIsLogged(){
        return session()->has('user');
    }

    public function index(){

        if (!$this->userIsLogged()) {
            return view("logInForm");
        }

        return view('welcome');
    }

}
