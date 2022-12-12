<?php

namespace App\Http\Controllers;

use App\Models\MPrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privacypolicys = MPrivacyPolicy::where("del_flg", 0)
            ->paginate(5);
        return inertia('PrivacyPolicyTool', ['privacypolicys' => $privacypolicys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('AddPrivacyPolicy');
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
            'privacypolicys_title' => 'required',
            'privacypolicys_description' => 'required'
        ]);

        $privacypolicys = new MPrivacyPolicy();
        $privacypolicys->insertData($request);

        return inertia('privacypolicyTool');
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
        $privacypolicys = new MPrivacyPolicy();
        $privacypolicysInfo = $privacypolicys->searchById($id);

        return inertia('EditPrivacyPolicy',['privacypolicysInfo' => $privacypolicysInfo]);
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
        $privacypolicys = new MPrivacyPolicy();
        $privacypolicys->updateData($request, $id);

        return inertia('PrivacyPolicyTool');
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
