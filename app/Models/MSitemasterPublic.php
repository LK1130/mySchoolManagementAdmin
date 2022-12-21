<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class MSitemasterPublic extends Model
{
    use HasFactory;


    public function uploadpublicSetting($request,$logos="",$favicons=""){
        DB::table('m_sitemaster_publics')
        ->where("id",1)
        ->update([
            'logo'=> $logos|| "/img/logo.png",
            'favicon' => $favicons || "/favicon.ico",
                'sitename'=>$request->input("sitenames"),
                'facebook_link'=>$request->input("facebook"),
                'youtube_link1'=>$request->input("youtube1"),
                'youtube_link2'=>$request->input("youtube2"),
                'copyright'=>$request->input("copyright"),
                'phones'=>$request->input("phone"),
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
