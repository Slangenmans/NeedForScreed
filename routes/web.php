<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Discipline_codesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SegmentsController;
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

Route::view('/', 'home')->name('home');

Route::middleware(['guest'])
    ->group(function () {
        // Register routes. Middleware will prevent logged in users from visiting register page
        Route::get('register', [RegisterController::class, 'create'])->name('register.create');
        Route::post('register', [RegisterController::class, 'store'])->name('register.store');
        // Login
        Route::get('login', [SessionsController::class, 'create'])->name('loginForm');
        Route::post('login', [SessionsController::class, 'store'])->name('login');
        // Segments [NOT FUNCTIONAL]
        Route::get('segments', [SessionsController::class, 'create'])->name('segmentsForm');
        Route::post('segments', [SessionsController::class, 'store'])->name('segments');
    });


Route::middleware(['auth'])
    ->group(function () {
        // Logout routes
        Route::post('logout', [SessionsController::class, 'destroy'])->name('logout');

        // Resource method handles URL routing and naming.
        // First param tells method to grab from projects dir. The second parameter will name according to action method (show, index, etc.)
        Route::resource('projects', ProjectsController::class);
        Route::resource('segments', SegmentsController::class);
    });

// Misc. routing
Route::view('project_test', 'project_test');
Route::view('project_parse', 'project_parse');
Route::view('create_project', 'create_project');
