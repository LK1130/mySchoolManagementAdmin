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
        ->where('del_flg', 0)
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
      public function get_dashboardclass(){
       return  DB::table('m_classes')
        ->join('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.id')
        ->leftjoin('t_student_classes', 'm_classes.id', '=', 't_student_classes.class_id')
        ->selectRaw("COUNT('t_student_classes.class_id') AS StudenyCount,m_classes.id, m_classes.c_name, m_classes.c_day, m_classes.c_start_time, m_classes.c_end_time, m_classes.c_fees, m_instructors.i_name,m_classes.created_at")
        ->orderBy('m_classes.created_at', 'desc')
        ->where('m_classes.del_flg',0)
        ->groupBy("m_classes.id")
        ->get();
      }
}
