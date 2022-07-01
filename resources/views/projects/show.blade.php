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
                </ul><br>
            </div>
    </div>
    <div class="show-segments">
        <?PHP
            use App\Models\Segment;
            use Illuminate\Support\Facades\DB;
            // Send query to database to collect all segments and store them in variable
            $segments = DB::table('segments')->where('project_id', $project->id)->get();
            // echo $segments;
            // dd($segments);
                     
            
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
                    <td>{$segment->price_per_unit}</td>
                    <td>{$segment->price_per_segment}</td>
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