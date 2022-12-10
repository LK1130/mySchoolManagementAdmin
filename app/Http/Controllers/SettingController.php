<?php

namespace App\Http\Controllers;

use App\Models\MSetting;
use App\Models\MSitemasterMyschool;
use App\Models\MSitemasterPublic;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

      return Redirect::route('setting.index')->with('message','success');

    }
    

    public function upload_public(Request $request){
        $request->validate([
            'logos' => 'mimes:png,jpg,jpeg,csv,svg',
            'favicons' => 'mimes:png,jpg,jpeg,csv,svg',
            'phone'=>'required|digits:9|numeric',
            'sitenames'=>'required',
            'facebook'=>'required|url',
            'youtube1'=>'required|url',
            'youtube2'=>'required|url',
            'copyright'=>'required'
        ]);
        // dd($request);
        $new = new MSitemasterPublic();
        // dd($request);
       if($request->hasFile('logos')) {
        $file= $request->file('logos');
        $logos = $file->storePublicly('logos', ['disk' => 'public']);
       }
       if($request->hasFile('favicons')) {
        $file= $request->file('favicons');
        $favicons = $file->storePublicly('favicons', ['disk' => 'public']);
       }
    

        $new->uploadpublicSetting($request,$logos,$favicons);
        
        return Redirect::route('setting.index')->with('message','success');
    }
    public function index(){
        $new = new MSitemasterMyschool();
        $uploadMysch  = $new->idUpdateOrgData();

        $s_public = new MSitemasterPublic();
        $upload_pub = $s_public->uplaod_public();
       
        return inertia('SettingAdmin',['mysch'=>$uploadMysch ,'public'=>$upload_pub]);
        
        
    }
}
