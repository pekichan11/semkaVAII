<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $comment = new Comment();
        $comment->text = $request->get('text');
        $comment->user_id = $request->get('user_id');
        $comment->book_id = $request->get('book_id');
        $comment->save();
        return $comment;
    }

    public function getCommetsByBookId($id) {
        return Comment::where('book_id', $id)->get();
    }
}
