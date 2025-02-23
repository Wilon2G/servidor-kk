<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;

class IndexController extends Controller
{
    public function index(){
        $books=Book::all();
        $customer=auth()->user();
        if ($customer) {
            $borroweBooks=BorrowedBook::getBooksIdByCustomer($customer["id"]);
        }
        else{
            $borroweBooks=[];
        }

        return view("main.library",["customer"=>$customer,"books"=>$books,"borrowedBooks"=>$borroweBooks]);
    }

    public function deleteBook(){

    }

}
