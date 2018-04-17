@extends('layouts.master')

@section('title')
Create new post
@endsection

@section('content')


<form method="POST" action="/posts">
{{csrf_field()}}
<h1>Create new post</h1>
    <div class="form-group">
        <label for="title">Ovo je naslov</label>
        <input id="title" type="text" name="title" class="form-control">
        @include('layouts.partials.error-message', ['fieldTitle' => 'title'])
    </div>
    <div class="form-group">
        <label for="body">Ovo je body</label>
        <textarea id="body" name="body" class="form-control"></textarea>
        @include('layouts.partials.error-message', ['fieldTitle' => 'body'])
    </div>
    <div class="form-group">
        <label for="is_published">Objavi?</label>
        <input type="checkbox" class="form-control" id="is_published" name="is_published" value="1" checked>
    </div>
    
    @if(count($tags))
        <div class="form-group">
            <label for="tags[]">TAGS</label> <br>
            @foreach($tags as $tag)
                <input type="checkbox" id="tag" name="tags[]" value="{{$tag->id}}">{{ $tag->name }} <br>
            @endforeach
        </div>
    @endif

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
