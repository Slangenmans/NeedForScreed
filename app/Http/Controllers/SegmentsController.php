<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Segment;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class SegmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET. Returns view called index. 
        return view('segments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET. Solely responsible for returning the create view
        return view('segments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Stap 0: file uploaden.
        $file = $_FILES['import_file'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $project_code = $request->project_code;
        $project = Project::firstWhere('project_code', $project_code);
        $file_name_new = '\\' . $project_code . '_' . $file_name;
        $target_directory = public_path('docs') . $file_name_new;

        move_uploaded_file($file_tmp, $target_directory);

        // Stap 1: XLS uitlezen, array maken met data.
        # Create a new Xls Reader
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

        // Tell the reader to only read the data. Ignore formatting etc.
        $reader->setReadDataOnly(true);

        // Read the spreadsheet file.
        $spreadsheet = $reader->load($target_directory);

        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $contents = $sheet->toArray();
        // First item removed, contains collumn header text
        array_shift($contents);
        $num_of_segments = count($contents);

        // Stap 2: Foreach loop waarbij je voor iedere rij uit de xls een nieuw segment aan maakt
        foreach ($contents as $row) {
            // Stap 3: Voor ieder segment (in de loop) de juiste data toewijzen aan bijbehorende velden
            $segment_description = $row[0];
            $job_description = $row[1];
            $isIsolation = boolval($row[2]);
            $thicknessIsolation = floatval($row[3]);
            $isDoneIsolation = boolval($row[4]);
            $isFloor = boolval($row[5]);
            $thicknessFloor = floatval($row[6]);
            $isDoneFloor = boolval($row[7]);
            $quantity = floatval($row[8]);
            $price_per_unit = floatval($row[9]);

            $project->segments()->create([
                'segment' => $segment_description,
                'description' => $job_description,
                'isIsolation' => $isIsolation,
                'thicknessIsolation' => $thicknessIsolation,
                'isDoneIsolation' => $isDoneIsolation,
                'isFloor' => $isFloor,
                'thicknessFloor' => $thicknessFloor,
                'isDoneFloor' => $isDoneFloor,
                'square_meters' => $quantity,
                'price_per_unit' => $price_per_unit,
                'price_per_segment' => $quantity * $price_per_unit,
            ]);
        }

        // Trigger save so totals are (re)calculated.
        $project->save();

        // Stap 6: Melding tonen over hoeveel segmenten zijn gemaakt/toegevoegd zijn aan project
        session()->flash('success', $num_of_segments . 'segments succesfully added!');

        // Stap 7: Redirect naar index pagina oid.
        return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Segment $project_code)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
