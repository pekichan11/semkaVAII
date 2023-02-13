<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{   
    //select book by id and all her comments
    public function show($id) {
        $comments = Comment::where('book_id', $id)->get();

        $book = Book::findOrFail($id);
        return view('pages.bookInfo',['book' => $book, 'comments' => $comments]);
    }

    //select all books
    public function getAllBooks() {
        $books = Book::all();
        
        return view('pages/books', ['books' => $books]);
    }

    //delete book
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

    //add a book
    public function addBook(Request $request) {
        
        $book = ($request->get('id') ? Book::find($request->get('id')) : new Book());
        
        $book->title = $request->get('title');
        $book->plot = $request->get('plot');
        $book->autor_id = $request->get('autor');
        $file = $request->file('image');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('img/books'), $filename);
        $book->img = $filename;
        $book->save();
        if($request->get('id')) {
            session(['info' => 'Book was edited']);
            return redirect('/book');
        } else {
            session(['success' => 'new book']);
            return redirect('/book');
        }
    }

    //edit book
    public function editBook($id) {
        $book = Book::findOrFail($id);
        return view('pages.editForm', ['book' => $book]);
    } 

}
