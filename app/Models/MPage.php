<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MPage extends Model
{
    use HasFactory;

    public function role()
    {
        return $this->belongsToMany(MRole::class,"m_role_pages");
    }
}
