<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MBlog extends Model
{
    use HasFactory;

    public function searchById($id){
        return DB::table('m_blogs')
            ->where('id',$id)
            ->first();
    }

    public function updateData($request, $image, $id)
    {
        $mblog = MBlog::find($id);
        $mblog->b_title = $request->blog_title;
        $mblog->b_description = $request->blog_description;
        $mblog->b_photo = $image;
        $mblog->save();
    }

    public function insertData($request,$image)
    {
        $mblog = new MBlog();
        $mblog->b_title = $request->blog_title;
        $mblog->b_description = $request->blog_description;
        $mblog->b_photo = $image;
        $mblog->save();
    }

    public function deleteData($id){
        $mblog = MBlog::find($id);
        $mblog->publish == 1 ? $mblog->publish = 0 : $mblog->publish = 1;
        $mblog->save();
    }
}
