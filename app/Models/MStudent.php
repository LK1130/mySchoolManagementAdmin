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
            ->get();


        // echo "<pre>";
        // print_r($query);
        // dd($query);
        return $query;
    }
}
