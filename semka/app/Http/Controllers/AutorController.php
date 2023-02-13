<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Book;

class AutorController extends Controller
{
    //

    public function getAutorById($id) {
        $autor = Autor::findOrFail($id);
        $books = Book::where('autor_id', $id)->limit(4)->get();
        return view('pages.autor', ['autor' => $autor, 'books' => $books]);
    }
}
