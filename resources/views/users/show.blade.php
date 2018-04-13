
    @extends('layouts.master')


@section('title')
User
@endsection

@section('content')
<div class="col-sm-8 blog-main">

      <div class="blog-post">
      <h2>{{$user->name}}</h2>
      <ul>
      @foreach($user->posts as $post)
      <li><a href="{{route('single-post', ['id'=>$post->id])}}">{{$post->title}}</a></li>
      <li> by {{$post->user->name}}
      <hr>
      @endforeach
      </ul>
      </div><!-- /.blog-post -->

      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
      </nav>

    </div><!-- /.blog-main -->
@endsection


