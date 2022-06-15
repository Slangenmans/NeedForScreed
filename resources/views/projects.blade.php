@extends('template')

@section('header')
        <h3>Projects</h3>
        <a href="/create_project"><input type="button" class="button" name="add_project" id="add_project" value="Add Project"></a>
@endsection
@section('content')
    <p>This is the content section. Welcome to the <b>projects page!</b> Check out the <a href="test_project">parsing test here</a>.</p>
@endsection