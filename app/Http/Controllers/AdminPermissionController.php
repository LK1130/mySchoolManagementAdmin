<?php

namespace App\Http\Controllers;

use App\Models\MPage;
use App\Models\MRole;
use App\Models\MRolePage;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class AdminPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $routeList = Route::getRoutes();

        // dd($routeList);

        $pages = MPage::where('del_flg', 0)->get();

        $role_pages = MRole::all();

        foreach ($role_pages as  $role_page) {
            $role_page->page;
        }

        return inertia('AdminPermission', [
            'role_page' => $role_pages,
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rolePage = new MRolePage();
        MRolePage::truncate();

        for ($i = 0; $i < count($request->lists); $i++) {
            $rolePage = new MRolePage();
            $rolePage->m_page_id = $request->lists[$i]["pageId"];
            $rolePage->m_role_id = $request->lists[$i]["roleId"];
            $rolePage->save();
        }

        return Redirect::route('adminPermission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
