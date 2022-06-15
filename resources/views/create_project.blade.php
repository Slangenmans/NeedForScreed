{{-- Cannot get view to load from Projects directory --}}
@extends('template')

@section('header')
        <h3>Projects</h3>
        <a href="/"><input type="button" name="confirm_project" id="confirm_project" value="Confirm"></a>
@endsection

@section('content')
    <h1>Create a project</h1>
    <form action="/">
        <label for="project_code">Project code</label><br>
        <input type="text" id="project_code" name="project_code"><br>
        <label for="discipline_code">Discipline code</label><br>
        <input type="text" id="discipline_code" name="discipline_code"><br>
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="address">Address</label><br>
        <input type="text" id="address" name="address"><br>
        <input type="submit" value="Submit">
    </form>
@endsection