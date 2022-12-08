<?php

namespace App\Http\Controllers;

use App\Models\MPrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $privacypolicys = MPrivacyPolicy::where("del_flg",0)
        ->paginate(5);
        return inertia('PrivacyPolicyTool',['privacypolicys'=> $privacypolicys]);
    }
}
