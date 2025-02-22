<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class IndexController extends Controller
{
    public function index(){
        $books=Book::all();
        $customer=auth()->user();

        //dd($customer);

        return view("main.library",["customer"=>$customer,"books"=>$books]);
    }

}
