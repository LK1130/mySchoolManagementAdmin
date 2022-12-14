<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MStudent extends Model
{
    use HasFactory;

    public function getStudents()
    {
        return DB::table("users")->where('del_flg', 0)->get();
    }



    public function allStuents($selectedItem = [], $search = "")
    {
        // $query = DB::select("SELECT COUNT(t_student_classes.class_id),users.age,users.email,users.phone,users.address,users.name  FROM `users`
        //         JOIN t_student_classes
        //         ON t_student_classes.user_id = users.id
        //         GROUP BY t_student_classes.user_id");
        $query = DB::table("users")
            ->join("t_student_classes", "t_student_classes.user_id", "=", "users.id")
            ->join("m_classes", "m_classes.id", "=", "t_student_classes.class_id")
            ->groupBy("t_student_classes.user_id");

        // dd($selectedItem[0]);
        $query->when(empty($selectedItem) && empty($search), function ($query) {

            return $query->selectRaw("COUNT('t_student_classes.class_id') AS Class,users.age,users.email,users.phone,users.address,users.name,users.id");
        });



        $query->when($search, function ($query) use ($search) {
            return  $query
                ->selectRaw("COUNT('t_student_classes.class_id') AS Class,users.age,users.email,users.phone,users.address,users.name,users.id")
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        });

        // $query->when($selectedItem == 0, function ($query) use ($selectedItem) {
        //     return $query
        //         ->selectRaw("COUNT('t_student_classes.class_id') AS Class,users.age,users.email,users.phone,users.address,users.name,users.id")
        //         ->whereNotIn('users.id', 't_student_classes . user_id');
        // });

        $query->when($selectedItem, function ($query) use ($selectedItem) {
            // dd(implode(",", $selectedItem));
            return $query
                ->selectRaw("COUNT('t_student_classes.class_id') AS Class,users.age,users.email,users.phone,users.address,users.name,users.id")
                ->whereIn('m_classes.category_id', $selectedItem);
        });
        // dd($search);

        $messages = $query->paginate(15)->withQueryString();
        // dd($messages);


        // echo "<pre>";
        // print_r($query);
        // dd($query);
        return $messages;
    }

    public function studnetDetailandClasses($id)
    {
        $query = DB::table("users")
            ->join("t_student_classes", "t_student_classes.user_id", "=", "users.id")
            ->join("m_classes", "m_classes.id", "=", "t_student_classes.class_id")

            ->selectRaw("GROUP_CONCAT(m_classes.c_name) AS Class,users.name,users.age,users.phone,users.address,users.email,users.profile_photo_path")
            ->where("users.id", "=", $id)
            // ->select("*")
            ->get();

        return $query;
    }

    public function studentAccount($request, $password)
    {
        return DB::table("users")
            ->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password)
            ]);
    }

    public function category()
    {
        $query = DB::table("m_categories")
            ->select('*')
            ->get();

        return $query;
    }
}
