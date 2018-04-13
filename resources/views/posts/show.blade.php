
    @extends('layouts.master')


    @section('title')
    {{$post->title}}
    @endsection

    @section('content')
    <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at}}</p>

            <p>{{$post->body}}</p>

            
            <hr/>
            <h4>comments</h4>

            <form method="POST" action="{{route('comments-post', ['post_id' => $post->id])}}">
              {{csrf_field()}}
              <div class="form-group">
                  <label for="text">Molimo unestite komentar: </label>
                  <textarea id="text" name="text" class="form-control"></textarea>
                  @include('layouts.partials.error-message', ['fieldTitle' => 'text'])
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Dodaj komentar</button>
              </div>
            </form>

            @if(count($post->comments))
            <ul class="list-unstyled">
              @foreach($post->comments as $comment)
                <li>
                <p>{{$post->user->name}}</p>
                </li>
                <li>
                  <p>{{$comment->text}}</p>
                </li>
                <hr><hr>
              @endforeach
            </ul>
            @endif

          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>

        </div><!-- /.blog-main -->
    @endsection


