<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MVideo extends Model
{
    use HasFactory;
    public function TLectureNote()
    {
        return $this->hasMany(TLectureNote::class);
    }
}
