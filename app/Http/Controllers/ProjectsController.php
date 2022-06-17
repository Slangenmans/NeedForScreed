<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private static function getData()
    {
        // Function only used to return static data to see if it renders in the view
        return [
            ['id' => 1, 'project_code' => 200001, 'name' => 'Project One', 'address' => "Y'r Mom's House"],
            ['id' => 2, 'project_code' => 200002, 'name' => 'Project Two', 'address' => "Y'r Dad's House"],
            ['id' => 3, 'project_code' => 200003, 'name' => 'Project Three', 'address' => "The Arristocrats"]
        ];
    }

    public function index()
    {
        // GET. Returns view called index. 
        return view('projects.index', [
            // Static data previously assigned to variable 'projects'
            // 'projects' => self::getData()

            // Reads data from database and assigns to projects variable
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET. Solely responsible for returning the create view
        return view('.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST
        // Instantiate object
        $project = new Project();

        // Assign form input names to database collumns using the 
        $project->project_code = $request->input('project_code');
        $project->name = $request->input('name');
        $project->address = $request->input('address');

        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        // GET
        $projects = self::getData();

        // array_search, combined with array_collumn, is used to parse through multidimensional arrays
        $index = array_search($project, array_column($projects, 'id'));

        if ($index === false) {
            abort(404);
        }

        return view('projects.show', [
            'project' => $projects[$index]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET
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
        // POST
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DELETE
    }
}