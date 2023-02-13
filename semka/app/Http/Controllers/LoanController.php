<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Auth;


class LoanController extends Controller
{
    public function getAll() {
        $user_id = Auth::user()->id;
        $loans = Loan::where('user_id', $user_id)->get();
        return view('pages.pozicane', ['loans' => $loans]);
    }

    public function pozicajKnihu(Request $request) {
        $loan = new Loan();
        $loan->book_id = $request->get('book_id');
        $loan->user_id = Auth::user()->id;
        $loan->save();
        return redirect('/book');
    }
}
