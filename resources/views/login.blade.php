@extends('layout')
@section('title') Вход в акаунт @endsection
@section('content')

<form action="/login_pro" method="post">
    @csrf
    @error('email'){{$message}} @enderror
    <input type="email" name="email"> <br>
    @error('password'){{$message}} @enderror
    <input type="password" name="password"> <br>
        <button>Ok</button>
</form>
    
@endsection