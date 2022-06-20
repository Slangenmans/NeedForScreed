@extends('template')

@section('content')
<div class="login-card">
    <h3>Login</h3>
    <form method="POST" action="/login">
        @csrf
        {{-- Email --}}
        <label for="email">Email: </label><br>
        <input type="email" name="email" id="email"><br>
        {{-- Password --}}
        <label for="password">Password: </label><br>
        <input type="password" name="password" id="password"><br>
        {{-- Submit button --}}
        <input type="submit" value="Submit">
    </form>
</div>
@endsection