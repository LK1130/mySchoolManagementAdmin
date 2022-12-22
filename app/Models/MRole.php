<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MRole extends Model
{
    use HasFactory;

    public function get_roles()
    {
        return DB::table('m_roles')->where('r_name', 'IN')->get();
    }

    public function page()
    {
        return $this->belongsToMany(MPage::class,"m_role_pages");
    }
}
