
    @extends('layouts.master')


    @section('title')
    Blog
    @endsection

    @section('content')
    <div class="col-sm-8 blog-main">

          <div class="blog-post">
          <ul>
          @foreach($posts as $post)
          <li><a href="{{route('single-post', ['id'=>$post->id])}}">{{$post->title}}</a></li>
          @endforeach
          </ul>
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->
    @endsection


    