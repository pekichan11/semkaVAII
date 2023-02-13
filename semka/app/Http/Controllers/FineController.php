<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
use Illuminate\Support\Facades\Auth;


class FineController extends Controller
{

    public function show() {
        $fines = Fine::where('user_id', Auth::user()->id)->get();
        return view('pages.fines', ['fines' => $fines]); 
    }
    
}
