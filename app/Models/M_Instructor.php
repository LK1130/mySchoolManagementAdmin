<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class M_Instructor extends Model
{
    public $table = 'm_instructors';
    use HasFactory;

    public function get_names()
    {
        return DB::table('m_admin')
            ->get();
    }
    public function addInstructor($i_role,  $request)
    {
        DB::table('m_instructors')
            ->insert([
                'ad_id' => $request->input('ad_id'),
                'i_name' => $request->input('name'),
                'i_contact' => $request->input('contact'),
                'i_address' => $request->input('address'),

                'role_id' => $i_role,
                'created_at' => Date('Y-m-d h:i:s'),
                'created_by' => "0"
            ]);
    }
    public function showInstructor($id)
    {
        return DB::table('m_instructors')->where('ad_id', $id)->get();
    }
    public function updateInstructor($i_id, $request)
    {
        DB::table('m_instructors')->where('ad_id', $i_id)->update([
            'i_name' => $request->input('name'),
            'i_contact' => $request->input('contact'),
            'i_address' => $request->input('address'),

            'role_id' => $request->input('role'),
            'created_at' => Date('Y-m-d h:i:s'),
            'created_by' => "0"
        ]);
    }
    public function getAllInstructor()
    {
        return
            DB::table('m_classes')
            ->join('m_instructors', 'm_classes.instructor_id', '=', 'm_instructors.id')
            ->join('m_categories', 'm_classes.category_id', '=', 'm_categories.id')
            ->where('m_classes.del_flg', 0)
            ->where('m_instructors.del_flg', 0)
            ->orderby("m_instructors.created_at", "desc")
            ->get();

        // DB::table('m_instructors')->where('del_flg', 0)->orderby("created_at", "desc")->get();
    }
    public function getCategories()
    {
        return
            DB::table('m_categories')
            ->where('del_flg', 0)
            ->get();

        // DB::table('m_instructors')->where('del_flg', 0)->orderby("created_at", "desc")->get();
    }
}
