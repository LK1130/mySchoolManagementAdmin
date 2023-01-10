<?php

use App\Http\Controllers\AddPageController;
use App\Http\Controllers\AddRoleController;
use App\Http\Controllers\AddVideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\BlogToolController;
use App\Http\Controllers\CategoryToolController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClasssController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuideToolController;
use App\Http\Controllers\Instructor;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailToolController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\viewclassController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
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
// Route::get('/addInstructor', function () {
//     return inertia("addInstructor");
// })->name("addInstructor.view");
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return Inertia::render('Dashboard');
//     })->name('dashboard');
// });

Route::get('/login', function () {
    return inertia("Admin/AdLogin");
});
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/searchstd/{name?}', [viewclassController::class, 'searchstudent']);

// Route::middleware([checkRole::class])->group(function(){
Route::get('/home', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [DashboardController::class, "getdashboard"]);

Route::get('/classview/{id?}', [viewclassController::class, "getclassdata"])->name("class.view");
// Route::get('/classsorting/{name?}', [viewclassController::class, "classsorting"])->name("class.sorting");
Route::get('/classscategory/{id?}', [viewclassController::class, "classcategory"])->name("class.category");


Route::resource('/class', ClassController::class);


Route::resource('/students', StudentController::class);
Route::resource('/addvideo', AddVideoController::class);


Route::resource('/instructors', InstructorController::class);
Route::get('/instructor/{class?}{name?}', [Instructor::class, 'index'])->name("instructor.index");
Route::get('/instructors/edit/{id}', [InstructorController::class, 'show'])->name("instructors.show");
Route::get('/instructors/create', [InstructorController::class, 'create'])->name("instructors.create");

Route::post('/setting/upload', [SettingController::class, 'upload'])->name("setting.upload");
Route::post('/setting/upload_public', [SettingController::class, 'upload_public'])->name("setting.upload_public");
// Route::get('/setting', function () {
//     return inertia("SettingAdmin");
// });
Route::get('/setting', [SettingController::class, 'index'])->name("setting.index");


// Route::resource('admin', AdminController::class);
// Route::get('/addadmin',function(){
//     return inertia("AddAdmin");
// });
// Route::get('/editadmin',function(){
//     return inertia("EditAdmin");
// });

// Start Tools
Route::resource('mailTool', MailToolController::class);
Route::resource('privacypolicyTool', PrivacyPolicyController::class);
Route::resource('categoryTool', CategoryToolController::class);
Route::resource('guideTool', GuideToolController::class);
Route::resource('blogTool', BlogToolController::class);
// End Tools

// Start Admin Permission
Route::resource('adminPermission', AdminPermissionController::class);
Route::resource('addRole', AddRoleController::class);
Route::resource('pageList', AddPageController::class);
// End Admin Permission
// });

Route::resource('admin', AdminController::class);

Route::get('logout', function () {
    session()->flush();

    return redirect('login');
});
