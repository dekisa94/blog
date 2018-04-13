<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentRecived;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store($postId)
    {
        $post = Post::find($postId);
        $this->validate(request(), ['text' => 'required|min:15']);
        $post->comments()->create(request()->all());

        Mail::to($post->user)->send(new CommentRecived($post));
        return redirect()->back();
    }
}
