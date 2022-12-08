<?php

namespace App\Http\Controllers;

use App\Models\MSetting;
use App\Models\MSitemasterMyschool;
use App\Models\MSitemasterPublic;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function upload(Request $request)
    {
        $new = new MSitemasterMyschool();
        // dd($request);
        // $facebook =$request->input('facebook');
        // $youtube1 =$request->input('youtube1');
        // $youtube2 =$request->input('youtube2');
        // $sitename =$request->input('sitename');
        // $messenger =$request->input('messenger');
        $request->validate([
            'logo' => 'mimes:png,jpg,jpeg,csv,svg',
            'favicon' => 'mimes:png,jpg,jpeg,csv,svg,ico',
            'sitename'=>'required',
            'facebook'=>'required|url',
            'youtube1'=>'required|url',
            'youtube2'=>'required|url',
            'youtube3'=>'required|url',
            'messenger'=>'required|url'
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
           $logo = $file->storePublicly('Logo', ['disk' => 'public']);
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
           $favicon = $file->storePublicly('favicon', ['disk' => 'public']);
        }
        $new->uploadSetting($request,$logo,$favicon);

      

    }
    

    public function upload_public(Request $request){
        $request->validate([
            'logo_p' => 'mimes:png,jpg,jpeg,csv,svg',
            'favicon_p' => 'mimes:png,jpg,jpeg,csv,svg,ico',
            'phone_p'=>'required|numeric|min:9|max:11',
            'sitename_p'=>'required',
            'facebook_p'=>'required|url',
            'youtube1_p'=>'required|url',
            'youtube2_p'=>'required|url',
            'copyright_p'=>'required'
        ]);
        // dd($request);
        $new = new MSitemasterPublic();
        // dd($request);
       if($request->hasFile('logo_p')) {
        $file= $request->file('logo_p');
        $logo_p = $file->storePublicly('logo_p', ['disk' => 'public']);
       }
       if($request->hasFile('favicon_p')) {
        $file= $request->file('favicon_p');
        $favicon_p = $file->storePublicly('favicon_p', ['disk' => 'public']);
       }
    

        $new->uploadpublicSetting($request,$logo_p,$favicon_p);
        
        
    }
    public function index(){
        $new = new MSitemasterMyschool();
        $uploadMysch  = $new->idUpdateOrgData();

        $s_public = new MSitemasterPublic();
        $upload_pub = $s_public->uplaod_public();
       
        return inertia('SettingAdmin',['mysch'=>$uploadMysch ,'public'=>$upload_pub]);
        
        
    }
}
