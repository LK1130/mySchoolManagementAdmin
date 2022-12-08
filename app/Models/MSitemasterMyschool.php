<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MSitemasterMyschool extends Model
{
    use HasFactory;

    public function uploadSetting($request,$logo_p="",$favicon_p=""){
        DB::table('m_sitemaster_myschools')
        ->where("id",1)
        ->update([
                'logo'=> $logo_p || "/img/logo.png",
                'favicon' => $favicon_p || "/favicon.ico",
                'facebook_link' =>$request->facebook,
                'messanger_link1'=>$request->input('messenger'),
                'youtube_link1'=>$request->input('youtube1'),
                'sitename'=>$request->input('sitename'),
                'youtube_link2'=>$request->input('youtube2'),
                'youtube_link3'=>$request->youtube3,
                'del_flg'=>1,
        ]);
    }
}
