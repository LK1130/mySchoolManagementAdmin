<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MSitemasterMyschool extends Model
{
    use HasFactory;

    public function uploadSetting($request,$logo,$favicon,$id){
        // DB::table('m_sitemaster_myschools')
        // ->where("id",1)
        // ->update([
        //         'logo'=> $logo || "/img/logo.png",
        //         'favicon' => $favicon  || "/favicon.ico",
        //         'facebook_link' =>$request->facebook,
        //         'messanger_link1'=>$request->input('messenger'),
        //         'youtube_link1'=>$request->input('youtube1'),
        //         'sitename'=>$request->input('sitename'),
        //         'youtube_link2'=>$request->input('youtube2'),
        //         'youtube_link3'=>$request->youtube3,
        //         'del_flg'=>1,
        // ]);
        $mSiteMaster = MSitemasterMyschool::find($id);
        $mSiteMaster->logo = $logo ;
        $mSiteMaster->favicon = $favicon;
        $mSiteMaster->sitename =$request->sitename;
        $mSiteMaster->facebook_link = $request->facebook;
        $mSiteMaster->youtube_link1 = $request->youtube1;
        $mSiteMaster->youtube_link2 = $request->youtube2;
        $mSiteMaster->youtube_link3 = $request->youtube3;
        $mSiteMaster->messanger_link1 = $request->messenger;
        $mSiteMaster->save();
    }

    public function idUpdateOrgData(){
        $query = DB::table("m_sitemaster_myschools")
        ->select('*')
        ->where('id',1)
        ->get();
        
        
        return $query;
        
    }
}
