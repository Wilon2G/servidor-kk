<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){


        return view("layout.main",['loggedIn'=>$this->userIsLogged()]);

    }

    public function userIsLogged(){
        return session()->has('customer_id');
    }
}
