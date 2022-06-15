<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Discipline_codesController;
use App\Models\Discipline_code;

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

Route::view('projects', 'projects');

Route::view('test_project', 'test_project');

Route::view('create_project', 'create_project');


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
