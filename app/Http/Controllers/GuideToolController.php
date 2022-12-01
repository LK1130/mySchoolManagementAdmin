<?php

namespace App\Http\Controllers;

use App\Models\MGuide;
use Illuminate\Http\Request;

class GuideToolController extends Controller
{
    public function index(){
        $guides = MGuide::where("del_flg",0)
        ->paginate(5);
        return inertia('GuideTool',['guides'=> $guides]);
    }
}
