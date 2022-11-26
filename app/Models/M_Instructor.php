<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class M_Instructor extends Model
{
    public $table = 'm_instructors';
    use HasFactory;

    public function get_roles()
    {
        return DB::table('m_roles')
            ->get();
    }
    public function addInstructor($i_role,  $request)
    {
        DB::table('m_instructors')
            ->insert([
                'i_name' => $request->input('name'),
                'i_contact' => $request->input('contact'),
                'i_address' => $request->input('address'),
                'i_email' => $request->input('email'),
                'role_id' => $i_role,
                'created_at' => Date('Y-m-d h:i:s'),
                'created_by' => "0"
            ]);
    }
    public function showInstructor($id)
    {
        return DB::table('m_instructors')->find($id);
    }
    public function updateInstructor($i_id, $request)
    {
        DB::table('m_instructors')->where('id', $i_id)->update([
            'i_name' => $request->input('name'),
            'i_contact' => $request->input('contact'),
            'i_address' => $request->input('address'),
            'i_email' => $request->input('email'),
            'role_id' => $request->input('role'),
            'created_at' => Date('Y-m-d h:i:s'),
            'created_by' => "0"
        ]);
    }
}
