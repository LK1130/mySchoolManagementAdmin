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
}
