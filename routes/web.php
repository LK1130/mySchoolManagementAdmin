<?php

use App\Http\Controllers\ClassesController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/homeclass', function () {
    return Inertia::render('Class');
});
Route::get('/viewclass', function () {
    return Inertia::render('ViewClass');
});
// Route::get('/addclass', function () {
//     return Inertia::render('AddClass');
// });
Route::get('/addclass', [ClassesController::class, 'index'])->name('index');
// Route::post('/AddClass',[ClassesController::class,'addclass'])->name("class.add");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

