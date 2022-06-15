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
            <a href="/projects">Project</a>
        </nav>
        {{-- Logo and username --}}
        <div class="top-content">
            <img src="imgs/logo.jpg" alt="Logo van Wouters Totaal Afbouw BV">
            <p class="text-welcome">Slotje Strontrammel!</p>
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
