<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Screed - TEMPLATE TITLE</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    </head>
    <body>
        <nav>
            <a href="/">Home</a>
            <a href="/project_test">Project</a>
            <a href="{{ route ('projects.index') }}">Projects DB Test</a>
        </nav>
        {{--  --}}
        @if (session()->has('succes'))
            <div class="register-succesful">
                <p>You've succesfully registered</p>
            </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        {{-- Logo and username --}}
        <div class="top-content">
            <img src="imgs/logo.jpg" alt="Logo van Wouters Totaal Afbouw BV">
            <div class="top-user">
                {{-- Display username, or login and register links --}}
                @guest
                <a href="/register" class="text-register">Register</a>
                <a href="/login" class="text-login">Login</a>
                @else
                <p>Welcome, {{ auth()->user()->name }}</p>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @endguest
            </div>
        </div>
        {{-- Page contents --}}
        <div class="content">
            <div class="content-header">
                @yield ('header')
            </div>
                @yield ('content')
        </div>
    </body>
</html>
