<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        // GET. Returns view called index. 
        return view('projects.index', [
            // Reads data from database and assigns to projects variable
            'projects' => Project::all(),
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
        return view('projects.create');
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
        $project = Project::create([
            'project_code' => $request->input('project_code'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'revenue' => 0.00,
            'costs' => 0.00,
            'PnR_euro' => 0.00,
        ])->save();

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
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
    public function update(Request $request, $project)
    {
        // POST
        $id = Project::find($project);

        $id->costs = $request->input('costs');
        $id->pNr_euro = $id->revenue - $id->costs;
        $id->pNr_percentage = $id->pNr_euro / $id->revenue * 100;

        $id->save();

        return redirect()->route('projects.index');
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
