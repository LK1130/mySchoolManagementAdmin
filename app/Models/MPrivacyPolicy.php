<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MPrivacyPolicy extends Model
{
    use HasFactory;

    public function searchById($id){
        return DB::table('m_privacy_policies')
            ->where('id',$id)
            ->first();
    }

    public function updateData($request, $id){
        DB::table('m_privacy_policies')
            ->where('id',$id)
            ->update([
                "p_title" => $request->input('privacypolicys_title'),
                "p_description" => $request->input('privacypolicys_description')
            ]);
    }
}
