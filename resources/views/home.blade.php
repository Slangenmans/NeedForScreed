@extends('template')

@section('header')

    @section('title')
        Home
    @endsection
    <h3>Welcome</h3>
@endsection
@section('content')
    <p>This web app was build to get familiar with <u>PHP</u> and <u>Laravel</u>. It's main purpose is to allow users to create screed-floor related projects, import segments that make up a project, update costs made so far and keep an eye on the financial state of a collection of projects.</p><br>
    <p>Progress, issues and more can be found on <a href="https://github.com/Slangenmans/DekvloerenBewaking">Github</a></p><br><br>
    <ul>
        <h3>Features to add:</h3>
        <li>User input to edit isDone boolean in segments table</li>
        <li>Updating project statistics like revenue and PnR when saving new values on Segments isDone collumn</li>
    </ul>
    
    {{-- <img src="imgs\science.jpg" alt="image containing science of various sorts"> --}}
@endsection