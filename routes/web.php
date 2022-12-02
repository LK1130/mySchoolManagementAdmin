<?php

use App\Http\Controllers\BlogToolController;
use App\Http\Controllers\CategoryToolController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClasssController;
use App\Http\Controllers\GuideToolController;
use App\Http\Controllers\Instructor;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\viewclassController;
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
Route::get('/classview/{id?}', [viewclassController::class, "getclassdata"])->name("class.view");
// Route::get('/viewclass', function () {
//     return Inertia::render('ViewClass');
// });

Route::resource('/class', ClassController::class);


Route::resource('/students', StudentController::class);
Route::get('/studentview/{students?}', [StudentController::class, "show"])->name('student.view');

Route::get('/student/view', function () {
    return inertia("StudentView");
});
Route::get('/Addstudent', function () {
    return inertia("AddStudent");
})->name("Addstudent.view");

Route::resource('/instructors', InstructorController::class);
Route::get('/instructor/{class?}{name?}', [Instructor::class, 'index'])->name("instructor.index");
Route::get('/instructors/edit/{id}', [InstructorController::class, 'show'])->name("instructors.show");
Route::get('/instructors/create', [InstructorController::class, 'create'])->name("instructors.create");

Route::get('/setting', function () {
    return inertia("SettingAdmin");
});

Route::get('/mailtool', function () {
    return inertia("MailTool");
});
Route::get('/privacypolicytool', [PrivacyPolicyController::class,'index']);

Route::get('/blogtool', [BlogToolController::class,'index']);

Route::get('/categoryTool', [CategoryToolController::class,'index']);

Route::get('/guideTool', [GuideToolController::class, 'index']);

Route::get('/editprivacypolicy',function(){
    return inertia("EditPrivacyPolicy");
});
Route::get('/editblog',function(){
    return inertia("EditBlog");
});
Route::get('/editcategory',function(){
    return inertia("EditCategory");
});
// Route::get('/addInstructor', function () {
//     return inertia("addInstructor");
// })->name("addInstructor.view");
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
