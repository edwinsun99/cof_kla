@extends('ce.layout.app')

@section('title', 'Home')

@section('content')
    <h1 style="color: purple;">
        Welcome back {{ Session::get('username') }}!
    </h1>

    <div style="text-align: center; margin-top: 20px;">
        <img src="{{ asset('images/ce.png') }}" 
             alt="Technicians" 
             style="width: 100%; height: auto; max-height: 80vh; object-fit: cover; border-radius: 12px;">
    </div>
    
@endsection
