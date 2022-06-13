<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Screed - TEMPLATE TITLE</title>

        <link rel="stylesheet" href="{{ asset('app.css') }}">
        
    </head>
    <nav>
        <a href="/">Home</a>
        <a href="/projects">Add Project</a>
    </nav>
    <body>
        @yield ('content')
    </body>
</html>
