<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(): View{
        $books= Book::all();

        //dump($books);

        return view('books',["books"=>$books,"user"=>$this->userBooksId()]);
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


    public function rent(){
        return null;
    }

    public function userBooks(){

        $customerBooksId =$this->userBooksId();
        //dd($customerBooksId);
        $customerBooks= Book::whereIn("id",$customerBooksId)->get();

        //dd($customerBooks);

        return redirect()->route('dashboard')->with("userBooks",$customerBooks);
        
    }
}
