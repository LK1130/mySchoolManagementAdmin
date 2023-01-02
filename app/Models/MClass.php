<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MClass extends Model
{
    use HasFactory;
    public $table = 'm_classes';
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

    public function category()
    {
        return  DB::table("m_categories")
            ->select('*')
            ->get();    
    }

    public function get_class($selectedItem = [], $sorting = "")
    {
    
            if(empty($selectedItem) && empty($sorting)){
                return DB::table('m_classes')
                ->join('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.id')
                ->selectRaw('m_classes.id, m_classes.c_name, m_classes.c_day, m_classes.c_start_time, m_classes.c_end_time, m_classes.c_fees, m_instructors.i_name')
                ->orderBy('m_classes.c_start_time', 'desc')
                ->where('m_classes.del_flg',0)
                ->get();
            }
    }

    public function get_classdetail($id)
    {
       return DB::table('m_classes')
        ->where('id',$id)
        ->get();
    }
    public function get_classdate($id)
    {
       return DB::table('m_classes')
        ->select('c_day')
        ->where('id',$id)
        ->first();
    }
    public function get_classdata($id)
    {
       return DB::table('m_classes')
        ->join('m_instructors','m_classes.instructor_id','=','m_instructors.id')
        ->join('m_categories','m_classes.category_id','=','m_categories.id')
        ->select('m_classes.id','m_classes.c_name as cname','m_categories.c_name','m_classes.c_profile','m_classes.c_description', 'm_classes.c_day', 'm_classes.c_start_time', 'm_classes.c_end_time', 'm_classes.c_fees', 'm_classes.c_start_date', 'm_classes.c_end_date','m_instructors.i_name')
        ->where('m_classes.id',$id)
        ->get();
    }
    public function get_eachclassstudents($id)
    {
       return DB::table('t_student_classes')
        ->join('users','t_student_classes.user_id','=','users.id')
        ->select('t_student_classes.start_join', 'users.name', 't_student_classes.paid_fees', 't_student_classes.remain_fees')
        ->where('t_student_classes.class_id',$id)
        ->get();
    }
    public function get_studentid($id)
    {
       return DB::table('t_student_classes')
        ->select( 'user_id')
        ->where('class_id',$id)
        ->get();
    }
    public function addclass(Request $request,$date,$img,$studentids)
    {
        $id = DB::table('m_classes')
            ->insertGetId([
                'c_name' => $request->input('classnames'),
                'c_description' => $request->input('classdetail'),
                'c_start_date' => $request->input('startdate'),
                'c_end_date' => $request->input('enddate'),
                'c_day' => $date,
                'c_start_time' => $request->input('starttime'),
                'c_end_time' => $request->input('endtime'),
                'c_fees' => $request->input('fees'),
                'instructor_id' => $request->input('teacher'),
                'c_profile' => $img,
                'category_id' => $request->input('categories'),
                'created_at' => Date('Y-m-d h:i:s'),
                'created_by' => "0"
            ]);

        foreach ($studentids as $ids) {
            DB::table('t_student_classes')
            ->insert([
                'class_id' => $id,
                'user_id' => $ids,
                'start_join' =>Date('Y-m-d h:i:s'),
                'paid_fees' => 00,
                'remain_fees' => 00,
                'created_at'=>Date('Y-m-d h:i:s'),
                'created_by'=>"0"
            ]);
        };
    }

    public function editclass(Request $request,$date,$img,$studentids,$id)
    {
        DB::table('m_classes')
        ->where('id',$id)
        ->update([
            'c_name' => $request->input('classnames'),
            'c_description' => $request->input('classdetail'),
            'c_start_date' =>$request->input('startdate'),
            'c_end_date' => $request->input('enddate'),
            'c_day'=>$date,
            'c_start_time'=>$request->input('starttime'),
            'c_end_time' =>$request->input('endtime'),
            'c_fees' =>$request->input('fees'),
            'instructor_id' =>$request->input('teacher') ,
            'c_profile' =>$img,
            'category_id' =>$request->input('categories'),
            'updated_at'=>Date('Y-m-d h:i:s'),
            'updated_by'=>"0"
        ]);

    }

    public function getClasses()
    {
        return DB::table('m_classes')
        ->select('id','c_name')
        ->get();
    }
}
