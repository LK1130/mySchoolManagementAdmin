<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
