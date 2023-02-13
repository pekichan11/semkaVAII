<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request) {
        $comment = new Comment();
        $comment->text = $request->get('text');
        $comment->user_id = $request->get('user_id');
        $comment->book_id = Auth::user()->id;
        $comment->user_name = User::find(Auth::user()->id)->name;
        $comment->save();
        return $comment;
    }

    public function getCommetsByBookId($id) {
        return Comment::where('book_id', $id)
                        ->orderBy('updated_at', 'desc')
                        ->get();
    }

    public function getThreeComments($id, $page) {
        return $comments = Comment::where('book_id', $id)
                            ->orderBy('updated_at', 'desc')
                            ->limit(3 * $page)
                            ->get();
    }
}
