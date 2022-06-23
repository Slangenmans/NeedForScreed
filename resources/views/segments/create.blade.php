@extends('template')

@section('header')
@endsection

@section('content')
<h1>Create segments</h1>

    {{-- Form  --}}
    <form method="POST" action="{{ route('segments.store') }}">
        @csrf
        <div>
            <label for="project_code">Project code</label><br>
            <select name="project_code" id="project_code">
            <?php
                // Database details, 
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_NAME', 'screed_projects');

                $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                
                // checking connection database
                if($link === false){
                    die("Error, could not do thingamajic" . mysqli_connect_error);
                }
                
                // if(isset($_GET['project_code'])){
                //     $project_code = _GET['project_code'];
                
                // Store MySQL syntax in variable
                $sql = "SELECT * FROM projects";
                
                // Perform query against database
                if($result = mysqli_query($link, $sql)) {
                    if(mysqli_num_rows($result) > 0 ) {
                        while($row = mysqli_fetch_array($result)){
                            echo '<option value="' . $row['project_code'] . '">' . $row['project_code'] . '</option>';
                        }
                    }
                }

            ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
@endsection