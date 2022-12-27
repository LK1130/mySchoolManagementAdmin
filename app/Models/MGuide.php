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



    public function addData($request){
        
        $guide = new MGuide();
        $guide->g_title = $request->guidetitle;
        $guide->save();
    }
    public function getLastData($data){
       return DB::table('m_guides')
        ->where('g_title',$data)
        ->get();
        
    }
}
