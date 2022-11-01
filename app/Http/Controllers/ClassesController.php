<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $class = new MClass();
        $instructors= $class->get_instructors();
        $categories= $class->get_category();
        $students= $class->get_student();
        return inertia("AddClass",['instructor' => $instructors,'category' => $categories,'student' => $students ]);
    }
}
