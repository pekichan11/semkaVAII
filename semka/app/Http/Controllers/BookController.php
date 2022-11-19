<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    //
    public function show($id) {
        return Book::findOrFail($id);
    }

    public function getAllBooks() {
        $books = Book::all();
        
        return view('pages/books', ['books' => $books]);
    }

    public function deleteBook($id) {
        
        try {
            $book = Book::findOrFail($id);
        } catch(ModelNotFoundException $e) {
            $books = Book::all();
            return view('pages/books', ['books' => $books])->with('warning', 'Something went wrong');
        }
        $book->delete();
        $books = Book::all();
        return view('pages/books', ['books' => $books])->with('info', 'book has been deleted');
    }

    public function addBook(Request $request) {
       $book = new Book();
       $book->title = $request->get('title');
       $book->plot = $request->get('plot');
       $book->save();
       
        $books = Book::all();
       return view('pages/books', ['books' => $books])->with('success','new book motherfucker');
    }

}
