<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MStudent extends Model
{
    use HasFactory;

    public function allStuents()
    {
        // $query = DB::select("SELECT COUNT(t_student_classes.class_id),users.age,users.email,users.phone,users.address,users.name  FROM `users`
        //         JOIN t_student_classes
        //         ON t_student_classes.user_id = users.id
        //         GROUP BY t_student_classes.user_id");
        $query = DB::table("users")
            ->join("t_student_classes", "t_student_classes.user_id", "=", "users.id")
            ->groupBy("t_student_classes.user_id")
            ->selectRaw("COUNT('t_student_classes.class_id') AS Class,users.age,users.email,users.phone,users.address,users.name,users.id")
            ->paginate(15);


        // echo "<pre>";
        // print_r($query);
        // dd($query);
        return $query;
    }

    public function oneStudentDetail($id)
    {
        $query = DB::table("users")
            ->leftJoin("t_student_classes", "t_student_classes.user_id", "=", "users.id")
            ->leftJoin("t_student_exams", "t_student_exams.user_id", "=", "users.id")
            ->leftJoin("t_student_attendances", "t_student_attendances.user_id", "=", "users.id")
            ->selectRaw("*")
            ->where('users.id', $id)
            ->first();
        // dd($query);
        return $query;
    }
}
