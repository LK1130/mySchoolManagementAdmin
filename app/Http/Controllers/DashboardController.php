<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use App\Models\Mdashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getdashboard(){
        $class=new MClass();
        $dashboard=new Mdashboard();
        $allstudents=$dashboard->get_allsudent();
        $jpstudent=$dashboard->get_japanesestudent();
        $wbstudent=$dashboard->get_webstudent();
        $jvstudent=$dashboard->get_jvstudent();
        $classdata=$class->get_class();
        return inertia("Dashboard",['allstudent' => $allstudents,'jpstudent' => $jpstudent,'wbstudent' => $wbstudent,'jvstudent' => $jvstudent,'classdata' => $classdata]);
    }

}
