<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Loan;

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
    public function deleteBook(Request $request) {
        try {
            $book = Book::findOrFail($request->get('book_id'));
        } catch(ModelNotFoundException $e) {
            session(['warning', 'Something went wrong!']);
            return redirect('/book');
        }
        $loans = Loan::where('book_id', $book->id)->get;
        foreach ($loans as $loan) {
            $loan->delete();
        }
        $book->delete();
        session(['success' => 'Book deleted!']);
        return redirect('/book');
    }

    //add a book
    public function addBook(Request $request) {
        
        $book = ($request->get('id') ? Book::find($request->get('id')) : new Book());
        
        $book->title = $request->get('title');
        $book->plot = $request->get('plot');
        $book->autor_id = $request->get('autor');
        if($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('img/books'), $filename);
            $book->img = $filename;
        }
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
