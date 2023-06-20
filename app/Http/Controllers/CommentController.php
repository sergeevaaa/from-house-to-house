<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        return view('admin.comments', [
            'comments' => Comment::all()->sortByDesc('created_at')
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $app_id)
    {
        $comment = new Comment;
        $comment->user_id = Auth::id();
        $comment->application_id = $app_id;
        $comment->comment = $request['comment'];
        $comment->save();
        return back();
    }


    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }


    public function destroy($id)
    {
        Comment::find($id)->delete();
        return back();
    }
}
