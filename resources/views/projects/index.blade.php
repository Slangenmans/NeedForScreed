@extends('template')

@section('header')
        <h3>Projects Database Test Page</h3>
        <a href="projects/create"><input type="button" class="button" name="add_project" id="add_project" value="Add Project"></a>
@endsection
@section('content')
    <p>Who's ready to create some data?</p>

    @if (count($projects) > 0)
    <div>
        @foreach ($projects as $project)

        <div>
            <h3>
                <a href="{{ route('projects.show', ['project' => $project['id']])}}">{{$project['project_code']}}</a>
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
            
        @endforeach
            
        @else
            <h2>There are no projects to display</h2>
        @endif
        
    </div>
@endsection