@extends('layouts.app')

@section('title', 'Register an account')

@section('content')
    
    <h1>Register page !</h1>
    <form action="/register" method="POST" style="display:flex;flex-direction:column;align-items:flex-start;">
        @csrf
        <input type="text" name="first_name" placeholder="First Name..." autocomplete="off" value="{{Request::old('first_name')}}">
        <input type="text" name="last_name" placeholder="Last Name..." autocomplete="off" value="{{Request::old('last_name')}}">
        <input type="email" name="email" placeholder="Email..." autocomplete="off" value="{{Request::old('email')}}">
        <input type="text" name="age" placeholder="Age..." autocomplete="off" value="{{Request::old('age')}}">
        <input type="password" name="password" placeholder="Password..." autocomplete="off" value="{{Request::old('password')}}">
        <button type="submit">Register</button>
    </form>
@endsection