@extends('layouts.app')

@section('title', 'Confirm your registration')

@section('content')
    <h1>You are almost done with your registration {{$first_name}}</h1>
    <p>Visit your google mail << {{$email}} >> to confirm your account and complete your registration</p>
@endsection