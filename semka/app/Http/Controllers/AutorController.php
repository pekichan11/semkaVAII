<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Book;

class AutorController extends Controller
{
    public function store(Request $request) {
        if(Auth::user()->role !== 'admin') {
            return abort(404);
        }
        $autor = new Autor();
        $autor->name = $request->get('name');
        $autor->birthdate = $request->get('birthdate');
        if($request->file('img')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('img/autors'), $filename);
            $autor->img = $filename;
        }
        $autor->info = $request->get('info');
        $autor->save();
        return redirect('/autors');
    }

    public function getAll() {
        return view('pages.autors', ['autors' => Autor::orderBy('name')->get()]);
    }

    public function getAutorById($id) {
        $autor = Autor::findOrFail($id);
        $books = Book::where('autor_id', $id)->limit(4)->get();
        return view('pages.autor', ['autor' => $autor, 'books' => $books]);
    }
}
