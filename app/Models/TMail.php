<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TMail extends Model
{
    use HasFactory;

    public function insertClassMail($request){
        $tmail = new TMail();
        $tmail->m_title = $request->title;
        $tmail->m_description = $request->description;
        $tmail->class_id = $request->class;
        $tmail->m_category = $request->category;
        $tmail->save();
    }

    public function insertStudentMail($request){
        $tmail = new TMail();
        $tmail->m_title = $request->title;
        $tmail->m_description = $request->description;
        $tmail->user_id = $request->student;
        $tmail->m_category = $request->category;
        $tmail->save();
    }

    public function getEmails($classId){
        $query = DB::table('users')
            ->select('email')
            ->join('t_student_classes','users.id','=','t_student_classes.id')
            ->where('t_student_classes.class_id','=',$classId)
            ->get();
        return $query;

        // SELECT `email` FROM `users` AS user JOIN `t_student_classes` AS class ON user.id = class.user_id WHERE class_id = 1
    }   
}
