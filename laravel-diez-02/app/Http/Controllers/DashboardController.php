<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $books= Book::all();

        return view( "layout.main",['loggedIn'=>$this->userIsLogged(),"books"=>$books,"user"=>$this->userBooksId(),"menu"=>1]);
    }

    public function userIsLogged(){
        return session()->has('customer_id');
    }

    public function userBooksId(){
        if (!session()->has('customer_id')) {
            return null;
        }
        $customerId=session("customer_id");
        $customerBooksId=BorrowedBook::where("customer_id",$customerId)->pluck("book_id");
        //dd($customerBooksId);
        return $customerBooksId;
    }


}
