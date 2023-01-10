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
    public function get_videos($id)
    {
        return  DB::table('m_videos')
            ->join('t_lecture_notes', 'm_videos.id', '=', 't_lecture_notes.video_id')
            // ->selectRaw("COUNT('t_lecture_notes.id') AS Lecture,m_videos.id,m_videos.v_name,m_videos.v_date")
            ->get();
    }
}
