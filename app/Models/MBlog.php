<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MBlog extends Model
{
    use HasFactory;

    public function searchById($id){
        return DB::table('m_blogs')
            ->where('id',$id)
            ->first();
    }
}
