<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;

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
        // POST
        // Instantiate object
        $segment = new Segment();

        // Assign form input names to database collumns using the 
        $segment->project_code = $request->input('project_code');
        $segment->segment = $request->input('segment');
        $segment->description = $request->input('description');
        $segment->isIsolation = $request->input('isIsolation');
        $segment->thicknessIsolation = $request->input('thicknessIsolation');
        $segment->isDoneIsolation = $request->input('isDoneIsolation');
        $segment->isFloor = $request->input('isFloor');
        $segment->thicknessFloor = $request->input('thicknessFloor');
        $segment->isDoneFloor = $request->input('isDoneFloor');
        $segment->square_meters = $request->input('square_meters');
        $segment->price_per_unit = $request->input('price_per_unit');
        $segment->price_per_segment = $request->input('price_per_segment');


        $segment->save();

        return redirect()->route('segment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
