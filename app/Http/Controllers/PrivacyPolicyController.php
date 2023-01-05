<?php

namespace App\Http\Controllers;

use App\Models\MCategory;
use App\Models\MPrivacyPolicy;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        return inertia('PrivacyPolicyTool', [
            'privacypolicys' => $privacypolicys
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = MCategory::where("del_flg", 0)->get();

        // dd($categories);
        return inertia('AddPrivacyPolicy', ['categories' => $categories]);
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
            'privacypolicys_description' => 'required',
            'category' => 'required'
        ]);

        $privacypolicys = new MPrivacyPolicy();
        $privacypolicys->insertData($request);

        return Redirect::route('privacypolicyTool.index');
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

        $categories = MCategory::where("del_flg", 0)->get();

        return inertia('EditPrivacyPolicy', [
            'privacypolicysInfo' => $privacypolicysInfo,
            'categories' => $categories
        ]);
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
        $request->validate([
            'privacypolicys_title' => 'required',
            'privacypolicys_description' => 'required',
            'category' => 'required'
        ]);
        
        $privacypolicys = new MPrivacyPolicy();
        $privacypolicys->updateData($request, $id);

        return Redirect::route('privacypolicyTool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $privacypolicys = new MPrivacyPolicy();
       $privacypolicys->deleteData($id);

       return Redirect::route('privacypolicyTool.index');
    }
}
