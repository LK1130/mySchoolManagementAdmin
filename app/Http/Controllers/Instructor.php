<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use App\Models\M_Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Instructor extends Controller
{
    public function index($class = "")
    {


        $classes = DB::table('m_classes')->selectRaw("COUNT(m_classes.id) AS classes , m_classes.instructor_id AS insId")->leftjoin('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.id')->orderby("m_instructors.id", "desc")->groupBy("m_classes.instructor_id")->get();

        $query = DB::table('m_classes')->selectRaw("m_classes.instructor_id , m_instructors.i_name , m_instructors.i_contact , m_instructors.i_address  , COUNT(t_student_classes.class_id) AS students")
            ->leftjoin('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.ad_id')
            ->leftjoin('t_student_classes', 'm_classes.id', '=', 't_student_classes.class_id')
            ->where('m_classes.del_flg', 0)
            ->where('m_instructors.del_flg', 0)
            ->orderby("m_instructors.id", "desc")
            ->groupBy("m_classes.instructor_id")
            ->groupBy("m_instructors.i_name")
            ->groupBy("m_instructors.i_contact")
            ->groupBy("m_instructors.i_address");

        $query->when(!empty($class), function ($query) use ($class) {
            return  $query->whereIn("m_classes.category_id",  explode(',', $class));
        });
        // $query = DB::select("SELECT i_name,i_contact,i_address, COUNT(ins.id) AS classes FROM m_classes class JOIN m_instructors ins ON class.instructor_id = ins.id GROUP BY ins.id");
        // if ($class == "") {
        //     $query = DB::select("SELECT i_name,i_contact,i_address, COUNT(ins.id) AS classes FROM m_classes class JOIN m_instructors ins ON class.instructor_id = ins.id GROUP BY ins.id WHERE m_classes.category_id IN explode(',', $class)");
        // }
        $instructors = $query->paginate(10);

        if ($class == "") {
            return inertia('Instructor/instructor', ['instructors' => $instructors, 'classes' => $classes, "checked" =>  explode(',', $class)]);
        }

        return inertia('Instructor/instructor', ['instructors' => $instructors, 'classes' => $classes, "checked" =>  explode(',', $class)]);
    }
}
