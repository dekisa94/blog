@extends('layouts.master')

@section('title')
Register
@endsection

@section('content')


<form method="POST" action="/register">
{{csrf_field()}}
<h1>Register:</h1>
    <div class="form-group">
        <label for="name">Ime:</label>
        <input id="name" type="text" name="name" class="form-control">
        @include('layouts.partials.error-message', ['fieldTitle' => 'name'])
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input id="title" type="text" name="email" class="form-control">
        @include('layouts.partials.error-message', ['fieldTitle' => 'email'])
    </div>
    <div class="form-group">
        <label for="age">Age:</label>
        <input id="age" type="number" name="age" class="form-control">
        @include('layouts.partials.error-message', ['fieldTitle' => 'age'])
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input id="password" type="password" name="password" class="form-control">
        @include('layouts.partials.error-message', ['fieldTitle' => 'password'])
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Registruj se</button>
    </div>
</form>

@endsection