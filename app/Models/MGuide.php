<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MGuide extends Model
{
    use HasFactory;

    public function searchById($id){
        return DB::table('m_guides')
            ->where('id',$id)
            ->first();
    }

    public function guideStep()
    {
        return $this->hasMany(MGuideStep::class, "guide_id", "id");
    }
}
