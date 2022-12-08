<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MSitemasterPublic extends Model
{
    use HasFactory;


    public function uploadpublicSetting($request,$logo_p="",$favicon_p=""){
        DB::table('m_sitemaster_publics')
        ->where("id",1)
        ->update([
            'logo'=> $logo_p || "/img/logo.png",
            'favicon' => $favicon_p || "/favicon.ico",
                'sitename'=>$request->input("sitename_p") || 'm_sitemaster_publics.sitename' ,
                'facebook_link'=>$request->input("facebook_p"),
                'youtube_link1'=>$request->input("youtube1_p"),
                'youtube_link2'=>$request->input("youtube2_p"),
                'copyright'=>$request->input("copyright_p"),
                'phones'=>$request->input("phone_p"),
            'del_flg'=>1,
    ]);
    }

    public function uplaod_public(){
        $querry = DB::table('m_sitemaster_publics')
        ->select('*')
        ->where('id',1)
        ->get();

        return $querry;
        // dd($querry);
    }
}
