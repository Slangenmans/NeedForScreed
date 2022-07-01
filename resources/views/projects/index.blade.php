@extends('template')

@section('title')
    Projects Overview
@endsection

@section('header')
        <h3>Projects Overview</h3>
        <a href="{{ route('projects.create') }}"><input type="button" class="button" name="add_project" id="add_project" value="Add Project"></a>
@endsection
@section('content')
    @if (count($projects) > 0)
    <div>
        <table>
            <tr>
                <th>Project code</th>
                <th>Project name</th>
                <th>Project address</th>
                <th>Revenue</th>
                <th>Costs</th>
                <th>Profit & risk (€)</th>
                <th>Profit & risk (%)</th>
            </tr>
        @foreach ($projects as $project)
            <tr>
                <td><a href="{{ route('projects.show', ['project' => $project['id']])}}">{{$project['project_code']}}</a></td>
                <td>{{ $project['name'] }}</td>
                <td>{{ $project['address'] }}</td>
                <td>€{{ $project['revenue'] }}</td>         
                <td>€{{ $project['costs'] }}</td>
                <td>{{ $project['pNr_euro'] }}</td> 
                <td>{{ $project['pNr_percentage'] }}%</td>
            </tr>
        @endforeach
        </table>
    </div>        
        @else
            <h2>There are no projects to display</h2>
        @endif
        
    </div>
@endsection