<?php

namespace App\Http\Controllers;

use App\Models\MSetting;
use App\Models\MSitemasterMyschool;
use App\Models\MSitemasterPublic;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function upload(Request $request)
    {
        // dd($request);
        $new = new MSitemasterMyschool();
        $id = 1;
        // dd($request);
        // $facebook =$request->input('facebook');
        // $youtube1 =$request->input('youtube1');
        // $youtube2 =$request->input('youtube2');
        // $sitename =$request->input('sitename');
        // $messenger =$request->input('messenger');

        $request->validate([
            'logo' => 'mimes:png,jpg,jpeg,csv,svg',
            'favicon' => 'mimes:png,jpg,jpeg,csv,svg,ico',
            'sitename' => 'required',
            'facebook' => 'required|url',
            'youtube1' => 'required|url',
            'youtube2' => 'required|url',
            'youtube3' => 'required|url',
            'messenger' => 'required|url'
        ]);





        if ($request->hasFile('logo') && $request->hasFile('favicon')) {
            $logoFile = $request->file('logo');
            $faviconFile = $request->file('favicon');
            $logo = env("DO_URL") . "/" . Storage::disk('digitalocean')->put('settings/system', $logoFile, 'public');
            $favicon = env("DO_URL") . "/" . Storage::disk('digitalocean')->put('settings/system', $faviconFile, 'public');
            $new->uploadSetting($request, $logo, $favicon, $id);


            return Redirect::route('setting.index')->with('message', 'success');
        }
    }


    public function upload_public(Request $request)
    {
        $id = 1;
        $request->validate([
            'logos' => 'mimes:png,jpg,jpeg,csv,svg',
            'favicons' => 'mimes:png,jpg,jpeg,csv,svg',
            'phone' => 'required|numeric|digits_between:9,13 ',
            'sitenames' => 'required',
            'facebook' => 'required|url',
            'youtube1' => 'required|url',
            'youtube2' => 'required|url',
            'copyright' => 'required'
        ]);
        // dd($request);
        $new = new MSitemasterPublic();
        // dd($request);
        //    if($request->hasFile('logos')) {



        //    }
        //    if($request->hasFile('favicons')) {
        //     
        //     // $favicons = $file->storePublicly('favicons', ['disk' => 'public']);
        //     
        //    }

        if ($request->hasFile('logos') && $request->hasFile('favicons')) {
            $logoFile = $request->file('logos');
            $faviconsFile = $request->file('favicons');
            $logos = env("DO_URL") . "/" . Storage::disk('digitalocean')->put('settings/public', $logoFile, 'public');
            $favicons = env("DO_URL") . "/" . Storage::disk('digitalocean')->put('settings/public', $faviconsFile, 'public');

            $new->uploadpublicSetting($request, $logos, $favicons, $id);

            return Redirect::route('setting.index')->with('message', 'success');
        } else {
        }
    }
    public function index()
    {
        $new = new MSitemasterMyschool();
        $uploadMysch  = $new->idUpdateOrgData();

        $s_public = new MSitemasterPublic();
        $upload_pub = $s_public->uplaod_public();

        return inertia('SettingAdmin', ['mysch' => $uploadMysch, 'public' => $upload_pub]);
    }
}
