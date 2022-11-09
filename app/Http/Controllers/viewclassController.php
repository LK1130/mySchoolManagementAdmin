<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use Illuminate\Http\Request;

class viewclassController extends Controller
{
    public function getclassdata($id){
        $class= new MClass();
        $classdata=$class->get_classdetail($id);
        return inertia("ViewClass",['classdata' => $classdata]);
    }
}
