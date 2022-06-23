@extends('template')

@section('header')
        <h3>Projects Database Test Page</h3>
        <a href="{{ route('segments.create') }}"><input type="button" class="button" name="add_project" id="add_project" value="Add Segments"></a>
@endsection
@section('content')
    <p>Who's ready to create some data?</p>
        <div>
            <h3>
                {{$project['project_code']}}
            </h3>
            <ul>
                <li>
                    <p><b>Project name:</b> {{ $project['name'] }}</p>
                </li>
                <li>
                    <p><b>Project address:</b> {{ $project['address'] }}</p>
                </li>
            </ul>
        </div>

@endsection