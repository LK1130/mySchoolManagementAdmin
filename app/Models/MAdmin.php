<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MAdmin extends Model
{
    use HasFactory;
    public function updateAdminRole($ad_id, $roleId)
    {
        DB::table('m_admin')->where('id', $ad_id)->update([
            'role' => $roleId

        ]);
    }

    public function Addadmin($request)
    {
        // DB::table('m_admin')
        // ->insert([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>$request->password,
        //     'role'=>$request->role

        // ]);
        $Aadmin = new MAdmin();
        $Aadmin->name = $request->name;
        $Aadmin->email = $request->email;
        $Aadmin->password =Hash::make($request->password);
        $Aadmin->role_id = $request->role;
        $Aadmin->save();
    }

    public function searchAdmin($id)
    {
        $sAdmin = DB::table('m_admins')
                ->where('id',$id)
                ->first();

                return $sAdmin;
    }

    public function updateAdmin($request,$id){

        // dd($request);
        $upadmin = MAdmin::find($id);
        $upadmin->name = $request->name;
        $upadmin->email = $request->email;
        $upadmin->role_id = $request->roles;
        if($request->password != null)$upadmin->password = Hash::make($request->password) ;
        $upadmin->save();
    }
    // public function showAdmin($request)
    // {
    //     $sAdmin = DB::table('m_admins')
    //         ->select('*')
    //         ->get();

    //     return $sAdmin;
    // }
        public function checkAdminEmail($email){
            $hasemail = MAdmin::where('email','=',$email)->get();

            return $hasemail;
        }

    // public function checkAdmin($request){
    //     dd($request);
    //     $admin = MAdmin::find($request->email , $request->password);
    //     $admin->save();
        

    // }
}
