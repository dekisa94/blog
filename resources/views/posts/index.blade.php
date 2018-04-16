
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
          <li> by <a href="{{route('users', ['user_id' => $post->user_id])}}">{{$post->user->name}}</a></li>
          <li>
            @foreach($post->tags as $tag)
              <a href="{{route('posts-tags',['tag' => $tag])}}">{{ $tag->name }}</a>
            @endforeach
          </li>
          <hr>
          @endforeach
          </ul>
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-{{ $posts->currentPage()==1 ? 'secundary disabled' : 'primary' }}" href="{{ $posts->previousPageUrl() }}">Prethodna</a>
            <a class="btn btn-outline-{{ $posts->hasMorePages() ? 'primary' : 'secundary disabled'}}" href="{{ $posts->NextPageUrl() }}">Sledeca</a>
          </nav>

        </div><!-- /.blog-main -->
    @endsection


    