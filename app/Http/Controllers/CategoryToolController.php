<?php

namespace App\Http\Controllers;

use App\Models\MCategory;
use Illuminate\Http\Request;

class CategoryToolController extends Controller
{
    public function index(){
        $categories = MCategory::where("del_flg",0)
        ->paginate(5);
        return inertia('CategoryTool',['categories'=> $categories]);
    }
}
