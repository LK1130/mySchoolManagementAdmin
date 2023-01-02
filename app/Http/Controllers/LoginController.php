<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\MAdmin;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Fortify\Http\Responses\LoginResponse;

class LoginController extends Controller
{
    //
    public function store(Request $request)
    {

            $admin = MAdmin::where('email','=',$request->email)->first();
        
            $request->validate([
                'email'=>'exists:m_admins,email'
            ]);
            // dd($admin);
            if(Hash::check($request->password , $admin->password)){
                session()->put('adminId', $admin->id);
                session()->put('roleId', $admin->role_id);

                return redirect('/home');
            }else{
               return redirect()->back()->with('message','Your password did not match');
            };
        // $request->authenticate();
            
        // $request->session()->regenerate();

       
    }
}
