<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TLectureNote extends Model
{

    public function mvideos()
    {
        return $this->belongsTo(M_Video::class);
    }

    use HasFactory;
}
