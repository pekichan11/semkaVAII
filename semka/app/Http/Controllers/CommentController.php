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
        $comment->user_id = Auth::user()->id;
        $comment->book_id = $request->get('book_id');
        $comment->user_name = User::find(Auth::user()->id)->name;
        $comment->save();
        return $comment;
    }

    public function getCommetsByBookId($id) {
        return Comment::where('book_id', $id)
                        ->orderBy('updated_at', 'desc')
                        ->get();
    }

    public function show($id) {
        $comment = Comment::findOrFail($id);
        if(Auth::user()->id !== $comment->user_id) {
            return aboirt(404);
        }
        return view('pages.editComment', ['comment'=> $comment]);
    }

    public function deleteComment($id) {
        $comment = Comment::findOrFail($id);
        if(Auth::user()->id !== $comment->user_id) {
            return aboirt(404);
        }
        $book_id = $comment->book_id;
        $comment->delete();
        session(['info' => 'Comment deleted!']);
        return redirect("/book" . "/" . $book_id);
    }

    public function edit($id, Request $request) {
        $comment = Comment::findOrFail($id);
        if(Auth::user()->id !== $comment->user_id) {
            return aboirt(404);
        }
        $comment->text = $request->get('text');
        $comment->save();
        $book_id = $comment->book_id;
        session(['info' => 'Comment edited!']);
        return redirect("/book" . "/" . $book_id);
    }

}
