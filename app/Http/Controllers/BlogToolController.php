<?php

namespace App\Http\Controllers;

use App\Models\MBlog;
use Illuminate\Http\Request;

class BlogToolController extends Controller
{
    public function index(){
        $blogs = MBlog::where("del_flg",0)
        ->paginate(5);
        return inertia('BlogTool',['blogs'=> $blogs]);
    }
}
