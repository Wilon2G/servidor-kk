<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AddBookController extends Controller
{
    public function index(){
        if (!auth()->check()) {
            return redirect()->route("login");
        }
        if (auth()->user()["type"]!=="admin") {
            return back()->withErrors(["Unauthorised"=>"You need admin priviledges to access this part of the site"]);
        }

        return view("main.addBook",["customer"=>auth()->user()]);
    }

    public function validation(){

        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'ISBN' => 'required|string|max:13|unique:books,ISBN',
            'author' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        Book::create($validated);

        return back()->with("success","Book added to the library!");
    }


}
