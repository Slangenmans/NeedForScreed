@extends('template')

@section('content')
<div class="register-card">
    <h3>Register</h3>
    <form method="POST" action="/register">
        @csrf
        {{-- Name --}}
        <label for="name">Name: </label><br>
        <input type="text" name="name" id="name"><br>
        {{-- Username --}}
        {{-- <label for="username">Username: </label><br>
        <input type="text" name="username" id="username"><br> --}}
        {{-- Password --}}
        <label for="password">Password: </label><br>
        <input type="password" name="password" id="password"><br>
        {{-- Email --}}
        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email"><br>
        {{-- Submit button --}}
        <input type="submit" value="Submit">
    </form>
</div>
@endsection