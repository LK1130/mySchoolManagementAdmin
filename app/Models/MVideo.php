<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MVideo extends Model
{
    use HasFactory;
    public function TLectureNote()
    {
        return $this->hasMany(TLectureNote::class, "video_id");
    }
    public function get_videos($id){
     return  DB::table('m_videos')
       ->where('del_flg',0)
       ->where('class_id',$id)
       ->get();
    }
}
