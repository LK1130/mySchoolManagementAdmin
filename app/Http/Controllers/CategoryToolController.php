<?php

namespace App\Http\Controllers;

use App\Models\MCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = MCategory::where("del_flg", 0)
            ->paginate(5);
        return inertia('CategoryTool', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('AddCategory');
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
            'category_name' => 'required',
            'category_description' => 'required'
        ]);

        $categories = new MCategory();
        $categories->c_name = $request->category_name;
        $categories->c_description = $request->category_description;
        $categories->save();

        return Redirect::route('categoryTool.index');
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
        $categories = new MCategory();
        $categoriesInfo = $categories->searchById($id);

        if ($categoriesInfo == null) {
            return Redirect::route('categoryTool.index');
        } else {

            return inertia('EditCategory', ['categoriesInfo' => $categoriesInfo]);
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
        $request->validate([
            'category_name' => 'required',
            'category_description' => 'required'
        ]);

        $categories = new MCategory();
        $categories->updateData($request, $id);

        return Redirect::route('categoryTool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = new MCategory();
        $categories->deleteData($id);

        return Redirect::route('categoryTool.index');
    }
}
