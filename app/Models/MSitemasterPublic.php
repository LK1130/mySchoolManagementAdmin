<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MSitemasterPublic extends Model
{
    use HasFactory;


    public function uploadpublicSetting($request,$logo="",$favicon=""){
        DB::table('m_sitemaster_publics')
        ->where("id",1)
        ->update([
            'logo'=> $logo || "/img/logo.png",
            'favicon' => $favicon || "/favicon.ico",
                'sitename'=>$request->sitename_p,
                'facebook_link'=>$request->facebook_p,
                'youtube_link1'=>$request->youtube1_p,
                'youtube_link2'=>$request->youtube2_p,
                'copyright'=>$request->copyright_p,
                'phones'=>$request->phone_p,
            'del_flg'=>1,
    ]);
    }
}
