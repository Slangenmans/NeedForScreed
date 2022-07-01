@extends('template')

@section('title')
    {{ $project['name'] }}
@endsection

@section('header')
        <h3></h3>
        <a href="{{ route('segments.create') }}"><input type="button" class="button" name="add_project" id="add_project" value="Add Segments"></a>
@endsection
@section('content')
    <div>
        <h1 class="project_title">
            <u>{{$project['project_code']}}</u>
        </h1>
        <a href="{{ route('projects.index') }}">Back</a>
            <div class="project_details">
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
                    <tr>
                        <td>{{$project['project_code']}}</td>
                        <td>{{ $project['name'] }}</td>
                        <td>{{ $project['address'] }}</td>
                        <td>€{{ $project['revenue'] }}</td>         
                        <td><form name="project-form" method="POST" action="{{ route('projects.update', $project['id']) }}">
                            @method('PUT')
                            @csrf
                            Costs: €<input type="number" name="costs" step="0.01" value="{{ $project['costs'] }}">
                            <input type="submit" class="costs-button" name="costs-button" value="Update costs">
                        </form></td>
                        <td>{{ $project['pNr_euro'] }}</td> 
                        <td>{{ $project['pNr_percentage'] }}%</td>
                    </tr><br>
                </table>
            </div>
    </div><br>
    <div class="show-segments">
        <?PHP
            use App\Models\Segment;
            use Illuminate\Support\Facades\DB;
            // Send query to database to collect all segments and store them in variable
            $segments = DB::table('segments')->where('project_id', $project->id)->get();

            // If segments for this project does not equal zero
            if($segments->count() >0){
                echo '<table>
                    <tr>
                        <th>Segment</th>
                        <th>Description</th>
                        <th>Square Meters</th>
                        <th>Price per Unit</th>
                        <th>Price per Segment</th>
                    </tr>';
            foreach ($segments as $segment) {
                echo "<tr>
                    <td>{$segment->segment}</td>
                    <td>{$segment->description}</td>
                    <td>{$segment->square_meters}</td>
                    <td>€{$segment->price_per_unit}</td>
                    <td>€{$segment->price_per_segment}</td>
                    </tr>";
            }
            echo '</table>';
            }
            else {
                echo '<i>This projects contains no imported segments.</i>';
            };
            // Else, display "There are no segments added to this project yet." 
        ?>
    </div>

@endsection