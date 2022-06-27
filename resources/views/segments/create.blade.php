@extends('template')

@section('header')
@endsection

@section('content')
<h1>Create segments</h1>

    {{-- Form  --}}
    <form method="POST" action="{{ route('segments.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="project_code">Project code: </label>
            <select name="project_code" id="project_code">
            
            <?php
                // Database details, 
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_NAME', 'screed_projects');
                
                // Open a new connection to the MySQL server
                // Method returns an object which represents the connection to a MySQL Server, or false on failure
                $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                
                // checking connection database
                if($link === false){
                    die("Error, could not do thingamajic" . mysqli_connect_error);
                }
                
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
            </select><br>
        </div>
        <div>
            <label for="import_file">Import file:</label>
            <input type="file" name="import_file" id="import_file" class="import_file">
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
@endsection