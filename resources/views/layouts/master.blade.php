
<!DOCTYPE html>
<html lang="en">
  @include('layouts.partials.header')

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="nav blog-nav">
          <a class="nav-link active" href="#">Home</a>
          <a class="nav-link" href="#">New features</a>
          <a class="nav-link" href="#">Press</a>
          <a class="nav-link" href="#">New hires</a>
          <a class="nav-link" href="#">About</a>
          @if(auth()->check())
          <div class="nav-link">{{auth()->user()->name}}</div>
          <a class="nav-link" href="/logout">LOGOUT</a>
          @else 
          <a class="nav-link" href="/login">LOGIN</a>
          <a class="nav-link" href="/register">REGISTER</a>
          @endif
        </nav>
      </div>
    </div>

    <div class="blog-header">
      <div class="container">
        <h1 class="blog-title">The Laravel Blog</h1>

        @if($message = session('message'))
        <div class="alert alert-success">
          {{$message}}
        </div>
        @endif

        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
      </div>
    </div>

    <div class="container">

      <div class="row">

        @yield('content')

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
         
          <div class="sidebar-module">
            <h4>Tagovi</h4>
            <ol class="list-unstyled">
            @foreach($tags as $tag)
              <li><a href="/posts/tag/{{ $tag->name }}">{{$tag->name}}</a></li>
            @endforeach
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    @include('layouts.partials.footer')
  </body>
</html>
