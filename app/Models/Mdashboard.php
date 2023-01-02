<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mdashboard extends Model
{
    use HasFactory;
    public function get_allsudent(){
     return   DB::table('users')
        ->select('id')
        ->get();
        
    }
    public function get_japanesestudent(){
      return  DB::table('t_student_classes')
        ->join('m_classes', 't_student_classes.class_id', '=', 'm_classes.id')
        ->select('t_student_classes.user_id')
        ->where('m_classes.category_id',2)
        ->get();
    }
    public function get_webstudent(){
        return  DB::table('t_student_classes')
          ->join('m_classes', 't_student_classes.class_id', '=', 'm_classes.id')
          ->select('t_student_classes.user_id')
          ->where('m_classes.category_id',1)
          ->get();
      }
      public function get_jvstudent(){
        return  DB::table('t_student_classes')
          ->join('m_classes', 't_student_classes.class_id', '=', 'm_classes.id')
          ->select('t_student_classes.user_id')
          ->where('m_classes.category_id',3)
          ->get();
      }
}
