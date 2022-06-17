<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Discipline_codesController;
use App\Http\Controllers\ProjectsController;
use App\Models\Discipline_code;
use phpDocumentor\Reflection\Types\Resource_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');

Route::view('project_test', 'project_test');

Route::view('project_parse', 'project_parse');

Route::view('create_project', 'create_project');

// Resource method handles URL routing and naming.
// First param tells method to grab from projects dir. The second parameter will name according to action method (show, index, etc.)
Route::resource('projects', ProjectsController::class);


// Attempt to get data in database
Route::post('/discipline_code', function () {
    return Discipline_code::create([
        'code' => 12,
        'description' => 'Anhydriet'
    ]);
});

Route::get('/discipline_code', function () {
    return Discipline_code::all();
});
