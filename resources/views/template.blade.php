<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Need for Screed - @yield('title')</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        
    </head>
    <body>
        <nav>
            <a href="/"><b>Home</b></a>
            <a href="{{ route ('projects.index') }}"><b>Projects</b></a>
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
            <div class="branding">
                <img src="imgs/screed.jpg" alt="Clipart depiction of Mr. Screed">
                <h1>Need for Screed</h1>
            </div>
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
