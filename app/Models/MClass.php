<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MClass extends Model
{
    use HasFactory;

    public function get_instructors()
    {
       return DB::table('m_instructors')
        ->get();
    }

    public function get_category()
    {
       return DB::table('m_categories')
        ->get();
    }

    public function get_student()
    {
       return DB::table('users')
        ->get();
    }
    
    public function get_class()
    {
       return DB::table('m_classes')
        ->join('m_instructors','m_classes.instructor_id','=','m_instructors.id')
        ->get();
    }

    public function addclass(Request $request,$date)
    {
        DB::table('m_classes')
        ->insert([
            'c_name' => $request->input('classnames'),
            'c_description' => $request->input('classdetail'),
            'c_start_date' =>$request->input('startdate'),
            'c_end_date' => $request->input('enddate'),
            'c_date'=>$date,
            'c_start_time'=>$request->input('starttime'),
            'c_end_time' =>$request->input('endtime'),
            'c_fees' =>$request->input('fees'),
            'instructor_id' =>$request->input('teacher') ,
            'c_profile' =>"10111",
            'category_id' =>$request->input('categories'),
            'created_at'=>Date('Y-m-d h:i:s'),
            'created_by'=>"0"
        ]);
    }
}
