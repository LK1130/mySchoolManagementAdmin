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
            'logo' => '|mimes:png,jpg,jpeg,csv,svg',
            'favicon' => 'required|mimes:png,jpg,jpeg,csv,svg,ico',
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

        $new = new MSitemasterPublic();

        $request->hasFile('');


        $new->uploadpublicSetting($request,$logo_p,$favicon_p);

        
    }
}
