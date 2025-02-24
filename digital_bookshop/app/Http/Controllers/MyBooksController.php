<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Sale;
use Illuminate\Http\Request;

class MyBooksController extends Controller
{
    public function index(){
        if (!auth()->check()) {
            return redirect()->route("login")->withErrors(["Unauthorised"=>"You need to be logged in to see your books"]);
        }

        $customer=auth()->user();


        $sales=Sale::where("customer_id",auth()->user()["id"])->get();
        $purchases=[];
        foreach ($sales as $sale) {
            $purchases[$sale->id]=$sale->getBooksPurchased();
        }

        return view("main.myBooks", ["customer"=>$customer,"purchases" => $purchases]);

    }
}
