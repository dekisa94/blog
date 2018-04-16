<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store']]);
    }
    public function index()
    {
        $posts=Post::where('is_published', true)->paginate(10);
        if (request()->page > $posts->lastPage()){
            return redirect()->back();
        }     
        else {return view('posts.index', compact(['posts']));   }
    }

    public function show($id)
    {
        $post=Post::with('comments')->find($id);
        return view('posts.show', compact(['post']));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), ['title'=>'required', 'body'=>'required|min:15']);
        $post= new Post();
        $post->title=request('title');
        $post->body=request('body');
        $post->user_id=auth()->user()->id;
        $post->is_published=request('is_published');
        $post->save();
        return redirect('/posts');
    }
}
