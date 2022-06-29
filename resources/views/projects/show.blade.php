@extends('template')

@section('header')
        <h3>Projects Database Test Page</h3>
        <a href="{{ route('segments.create') }}"><input type="button" class="button" name="add_project" id="add_project" value="Add Segments"></a>
@endsection
@section('content')
    <div>
        <h3 class="project_title">
            {{$project['project_code']}}
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
                    <form name="project-form" method="POST" action="{{ route('projects.update', $project['id']) }}">
                        @method('PUT')
                        @csrf
                        <li>
                            <p><b>Costs:</b> <input type="number" name="costs" step="0.01" value="{{ $project['costs'] }}">
                                <input type="submit" class="costs-button" name="costs-button" value="Update costs">
                            </p>
                        </li>
                    </form>
                    <li>
                        <p><b>Profit & risk (€):</b> €{{ $project['pNr_euro'] }}</p>
                    </li>
                    <li>
                        <p><b>Profit & risk (%):</b> {{ $project['pNr_percentage'] }}%</p>
                    </li>
                </ul>
            </div>
    </div>

@endsection