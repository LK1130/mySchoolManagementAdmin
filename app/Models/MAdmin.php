<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MAdmin extends Model
{
    use HasFactory;

    public function updateAdminRole($ad_id, $roleId)
    {
        DB::table('m_admin')->where('id', $ad_id)->update([
            'role' => $roleId

        ]);
    }
}
