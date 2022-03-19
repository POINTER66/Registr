@extends('layout')
@section('title') Регистрация @endsection
@section('content')
    
<form action="/registration_pro" method="post"> 
    @csrf
    @error('email'){{$message}} @enderror
    <input type="email" name="email"> <br>
      @error('password'){{$message}} @enderror
    <input type="password" name="password"> <br>
    <input type="password" name="password_confirmation"> <br>
        <button>Ok</button>
</form>

@endsection