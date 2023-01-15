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
            session(['warning', 'Something went wrong!']);
            return view('pages/books', ['books' => $books]);
        }
        $book->delete();
        $books = Book::all();
        session(['success' => 'Book deleted!']);
        return redirect('/');
    }

    public function addBook(Request $request) {
        
        $book = ($request->get('id') ? Book::find($request->get('id')) : new Book());
        
        $book->title = $request->get('title');
        $book->plot = $request->get('plot');
        $book->save();
        $books = Book::all();
        if($request->get('id')) {
            session(['info' => 'Book was edited']);
            return view('pages.books', ['books' => $books]);
        } else {
            session(['success' => 'new book']);
            return view('pages.books', ['books' => $books]);
        }
    }

    public function editBook($id) {
        $book = Book::findOrFail($id);
        return view('editForm', ['book' => $book]);
    } 

}
