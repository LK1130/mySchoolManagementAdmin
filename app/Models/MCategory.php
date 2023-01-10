<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MCategory extends Model
{
    use HasFactory;

    public function searchById($id){
        return DB::table('m_categories')
            ->where('id',$id)
            ->first();
    }

    public function updateData($request, $id)
    {
        $mcategory = MCategory::find($id);
        $mcategory->c_name = $request->category_name;
        $mcategory->c_description = $request->category_description;
        $mcategory->save();
    }

    public function deleteData($id){
        $mcategory = MCategory::find($id);
        $mcategory->del_flg = 1;
        $mcategory->save();
    }
}
