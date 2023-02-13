<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
use Illuminate\Support\Facades\Auth;


class FineController extends Controller
{
    public function store(Request $request) {
        
        if(Auth::user()->role !== 'admin') {
            return abort(403);
        }
        $fine = new Fine();
        $fine->user_id = $request->get('user_id');
        $fine->value = $request->get('value');
        $fine->text = $request->get('text');
        $fine->save();
        return redirect('/pozicky');
    }

    public function show() {
        if(Auth::user()->role ==='admin') {
            $fines = Fine::orderBy('user_id')->get();
        } else {
            $fines = Fine::where('user_id', Auth::user()->id)->get();
        }
        return view('pages.fines', ['fines' => $fines]); 
    }

    public function formWithUserId($user_id) {
        if(Auth::user()->role !== 'admin') {
            return abort(401);
        }
        return view('pages.editFine', ['user_id' => $user_id]);
    }

    public function destroy($id) {
        if(Auth::user()->role !== 'admin') {
            return abort(401);
        }
        $fine = Fine::findOrFail($id);
        $fine->delete();
        return $fine;
    }
    
}
