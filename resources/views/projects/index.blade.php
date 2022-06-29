@extends('template')

@section('title')
    Projects
@endsection

@section('header')
        <h3>Projects Database Test Page</h3>
        <a href="{{ route('projects.create') }}"><input type="button" class="button" name="add_project" id="add_project" value="Add Project"></a>
@endsection
@section('content')
    @if (count($projects) > 0)
    <div>
        @foreach ($projects as $project)

        <div class="projects-overview">
            <h3>
                <a href="{{ route('projects.show', ['project' => $project['id']])}}">{{$project['project_code']}}</a>
            </h3>
            <div class="project_details">
                <ul>
                    <li>
                        <p><b>Project name:</b> {{ $project['name'] }}</p>
                    </li>
                    <li>
                        <p><b>Project address:</b> {{ $project['address'] }}</p>
                    </li>
                    <li>
                        <p><b>Revenue:</b> €{{ $project['revenue'] }}</p>
                    </li>
                    <li>
                        <p><b>Costs:</b> €{{ $project['costs'] }}</p>
                    </li>
                    <li>
                        <p><b>Profit & risk (€):</b> {{ $project['pNr_euro'] }}</p>
                    </li>
                    <li>
                        <p><b>Profit & risk (%):</b> {{ $project['pNr_percentage'] }}%</p>
                    </li>  
                </ul>
            </div>
        </div>
            
        @endforeach
            
        @else
            <h2>There are no projects to display</h2>
        @endif
        
    </div>
@endsection