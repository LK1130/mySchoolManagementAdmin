<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use Illuminate\Http\Request;

class viewclassController extends Controller
{
    public function getclassdata($id){
        $class= new MClass();
        $classdata=$class->get_classdata($id);
        $students= $class->get_eachclassstudents($id);
        return inertia("ViewClass",['classdata' => $classdata,'students' => $students]);
    }
    public function classsorting($name){
        $class= new MClass();
        if ($name=="name") {
            $classdt=$class->get_classbyname();
            return inertia("Class",['dclass' => $classdt,'sorttype'=>"name"]);
        }
        if ($name=="status") {
            $classdt=$class->get_class();
            return inertia("Class",['dclass' => $classdt,'sorttype'=>"status"]);
        }


    }
    public function classcategory($id){
        $class= new MClass();
        return inertia("AddVideo",['dclass' => $id]);

    }
    public function searchstudent($name){
    return $name;
    }
}
