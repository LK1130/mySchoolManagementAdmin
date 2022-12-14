<?php

namespace App\Http\Controllers;

use App\Mail\CreateAdmin;
use App\Mail\EditAdmin;
use App\Models\MAdmin;
use App\Models\MRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admin = MAdmin::join('m_roles','m_roles.id','=','m_admins.role_id')
            ->selectRaw("m_admins.id,m_admins.name,m_admins.email,m_roles.r_name,m_admins.del_flg")
            ->orderBy("m_admins.id")
            ->paginate(10);


        return inertia('Admin', ['admins' => $admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = MRole::where("del_flg", 0)
            ->get();

        return  inertia('AddAdmin', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'unique:m_admins,email|email|required',
                'password' => 'required',
                'role' => 'exists:m_roles,id'
            ]
        );
            $mail =[
                    'email'=>$request->email,
                    'password'=>$request->password
            ];
        $addadmin = new MAdmin();
        $addadmin->Addadmin($request);
        Mail::to($request->email)->send(new CreateAdmin($mail));
        return Redirect::route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('admin.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edadmin = new MAdmin();
        $adminInfo = $edadmin->searchAdmin($id);

        if ($adminInfo == null) {
            return Redirect::route('admin.index');
        } else {
            $roles = MRole::where("del_flg", 0)
        ->get();
        // dd($adminInfo);
        return inertia('EditAdmin', ['adminInfo' => $adminInfo ,'roles'=> $roles]);
        }
        

        
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
        // dd($id);
        // dd($request->email);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'email|required',
                'password' => 'required',
                'role' => 'exists:m_roles,id'
            ]
        );
        $mail =[
            'email'=>$request->email,
            'password'=>$request->password
    ];
        $admin = new MAdmin();
        $findadmin = $admin->searchAdmin($id);
        // dd($findadmin->email);
        $admin->updateAdmin($request, $id);
        if ($request->email == $findadmin->email) {
            return Redirect::route('admin.index');
        } else {
            Mail::to($request->email)->send(new EditAdmin($mail));
            return Redirect::route('admin.index');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delAdmin = new MAdmin();
        $delAdmin->deleteAdmin($id);


        return Redirect::route('admin.index');
    }
}
