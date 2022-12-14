<?php

namespace App\Http\Controllers;

use App\Mail\StudentAccountCreate;
use App\Models\MStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

function generate()
{
    $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!#$%&*+';

    $randString = "";

    for ($i = 0; $i < 8; $i++) {
        $index =  rand(0, strlen($char) - 1);
        $randString .= $char[$index];
    }

    return $randString;
}

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->search;
        $checked = $request->selectedItem;
        // dd($request->all());

        // if($request.)
        // dd($checked);
        $model1 = new MStudent();
        $category = $model1->category();

        $tmpCheck = [];
        foreach ($category as $key => $value) {
            array_push($tmpCheck, $value->id);
        }

        $data = ($request->selectedItem) ?
            $model1->allStuents(explode("-", $checked))
            : $model1->allStuents("", $search);

        // dd($data);
        // typeOf($checked);
        return Inertia::render('Student', [
            'allStudents' => $data,
            'filter' => $search,
            'categories' => $category,
            'checkBox' => ($checked == "") ? $tmpCheck : explode("-", $checked),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia("AddStudent");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4|max:15',
            'email' => "required|unique:users,email|email"
        ]);

        // dd($request->email);
        $password = generate();
        $data = [
            'email' => $request->email,
            'password' => $password,
        ];

        // dd($password);
        Mail::to($request->email)->send(new StudentAccountCreate($data));
        $model = new MStudent();
        $model->studentAccount($request, $password);
        return Redirect::route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new MStudent();
        $studenProfile = $model->studnetDetailandClasses($id);
        // dd($studenProfile);
        return inertia('StudentView', ['studenProfile' => $studenProfile]);
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
