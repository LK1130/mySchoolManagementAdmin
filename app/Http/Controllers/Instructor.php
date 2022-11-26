<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use App\Models\M_Instructor;
use Illuminate\Http\Request;

class Instructor extends Controller
{
    public function index($class = "")
    {


        $query = MClass::join('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.id')

            ->where('m_classes.del_flg', 0)
            ->where('m_instructors.del_flg', 0)
            ->orderby("m_instructors.created_at", "desc");

        $query->when(!empty($class), function ($query) use ($class) {
            return  $query->whereIn("m_classes.category_id",  explode(',', $class));
        });

        $instructors = $query->paginate(10);


        if ($class == "") {
            return inertia('Instructor/instructor', ['instructors' => $instructors, "checked" =>  explode(',', $class)]);
        }

        return inertia('Instructor/instructor', ['instructors' => $instructors,  "checked" =>  explode(',', $class)]);
    }
}
