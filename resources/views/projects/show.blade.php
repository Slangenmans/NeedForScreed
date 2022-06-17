@extends('template')

@section('header')
        <h3>Projects Database Test Page</h3>
        <a href="/create_project"><input type="button" class="button" name="add_project" id="add_project" value="Add Project"></a>
@endsection
@section('content')
    <p>Who's ready to create some data?</p>
        <div>
            <h3>
                {{$project['project_code']}}
            </h3>
            <ul>
                <li>
                    {{ $project['name'] }}
                </li>
                <li>
                    {{ $project['address'] }}
                </li>
            </ul>
        </div>

@endsection