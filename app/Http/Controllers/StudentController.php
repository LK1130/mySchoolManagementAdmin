<?php

namespace App\Http\Controllers;

use App\Mail\StudentAccountCreate;
use App\Models\MStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

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
    public function index()
    {
        $model1 = new MStudent();
        $data = $model1->allStuents();
        return inertia('Student', [
            'allStudents' => $data
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
        Mail::to($request->email)->send(new StudentAccountCreate($data));
        dd($password);
        $model = new MStudent();
        $model->studentAccount($request, $password);
        return Redirect::route('students.view');
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
        $classnatt = $model->studentClassandAttend($id);
        return inertia('StudentView', ['students' => $classnatt]);
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
