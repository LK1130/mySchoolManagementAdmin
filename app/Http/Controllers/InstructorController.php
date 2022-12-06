<?php

namespace App\Http\Controllers;

use App\Models\M_Instructor;
use App\Models\MAdmin;
use App\Models\MClass;
use App\Models\MRole;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;



class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class = "")
    {

        // $query = MClass::join('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.id')
        //     ->join('m_categories', 'm_classes.category_id', '=', 'm_categories.id')
        //     ->where('m_classes.del_flg', 0)
        //     ->where('m_instructors.del_flg', 0)
        //     ->orderby("m_instructors.created_at", "desc");

        // $query->when(!empty($class), function ($query) use ($class) {
        //     return  $query->whereIn("m_categories.id",  explode(',', $class));
        // });

        // $instructors = $query->paginate(10);
        // if ($class == "") {
        //     return inertia('Instructor/instructor', ['instructors' => $instructors, "checked" =>  explode(',', $class)]);
        // }

        // return inertia('Instructor/instructor', ['instructors' => $instructors, "checked" =>  explode(',', $class)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $noAdmin = false;
        $class = new M_Instructor();
        $names = $class->get_Names();


        return inertia("Instructor/addInstructor", ['names' => $names, 'noAdmin' => $noAdmin]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new MRole();
        $roleId = $role->get_roles();
        $i_role = $roleId[0]->id;
        $instructor = new M_Instructor();
        // $role = $request->input('role');
        // $name = $request->input('name');
        // $email = $request->input('email');
        // $address = $request->input('address');
        // $contact = $request->input('contact');
        settype($i_role, "string");


        $instructor->addInstructor($i_role,  $request);
        $admin = new MAdmin();
        $admin->updateAdminRole($request->input("ad_id"), $i_role);
        return redirect('instructor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $class = new M_Instructor();

        $showInstructor = $class->showInstructor($id);

        return inertia("Instructor/editInstructor", ['instructor' => $showInstructor]);
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
    public function update(Request $request)
    {
        $instructor = new M_Instructor();
        $id = $request->input('id');
        settype($role, "string");
        $i_id = $id;
        $instructor->updateInstructor($i_id, $request);
        return redirect('instructor');
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

    // public function checkChecked($class = "")
    // {
    //     $query = M_Instructor::where("del_flg", 0)
    //         ->orderby("created_at", "desc");
    //     $query->when(!empty($class), function ($query) use ($class) {
    //         return  $query->whereIn("m_instructors",  explode(',', $class));
    //     });
    //     $instructors = $query->paginate(10);

    //     return inertia('Instructor/instructor', ['instructors' => $instructors, "checked" =>  explode(',', $class)]);
    // }
}
