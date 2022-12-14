<?php

namespace App\Http\Controllers;

use App\Models\MBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BlogToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = MBlog::where("del_flg", 0)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        return inertia('BlogTool', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('AddBlog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->blog_file);
        $request->validate([
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_file' => 'required'
        ]);

        $file = $request->file("blog_file");
        $blog_image = env("DO_URL") . "/" . Storage::disk('digitalocean')->put('blogs', $file, 'public');


        $blogs = new MBlog();
        $blogs->insertData($request, $blog_image);

        return Redirect::route('blogTool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Redirect::route('blogTool.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs = new MBlog();
        $blogsInfo = $blogs->searchById($id);

        if ($blogsInfo == null) {
            return Redirect::route('blogTool.index');
        } else {
            return inertia('EditBlog', ['blogsInfo' => $blogsInfo]);
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
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_file' => 'required'
        ]);

        $file = $request->file("blog_file");
        $blog_image = env("DO_URL") . "/" . Storage::disk('digitalocean')->put('blogs', $file, 'public');
        $blogs = new MBlog();
        $blogs->updateData($request, $blog_image, $id);

        return Redirect::route('blogTool.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs = new MBlog();
        $blogs->deleteData($id);

        return Redirect::route('blogTool.index');
    }
}
