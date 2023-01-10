<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MPrivacyPolicy extends Model
{
    use HasFactory;

    public function searchById($id)
    {
        return MPrivacyPolicy::find($id);
    }

    public function updateData($request, $id)
    {
        $mprivacypolicy = MPrivacyPolicy::find($id);
        $mprivacypolicy->p_title = $request->privacypolicys_title;
        $mprivacypolicy->p_description = $request->privacypolicys_description;
        $mprivacypolicy->category_id = $request->category;
        $mprivacypolicy->save();
    }

    public function insertData($request)
    {
        $mprivacypolicy = new MPrivacyPolicy();
        $mprivacypolicy->p_title = $request->privacypolicys_title;
        $mprivacypolicy->p_description = $request->privacypolicys_description;
        $mprivacypolicy->category_id = $request->category;
        $mprivacypolicy->save();
    }

    public function deleteData($id){
        $mprivacypolicy = MPrivacyPolicy::find($id);
        $mprivacypolicy->publish == 1 ? $mprivacypolicy->publish = 0 : $mprivacypolicy->publish = 1;
        $mprivacypolicy->save();
    }
}
