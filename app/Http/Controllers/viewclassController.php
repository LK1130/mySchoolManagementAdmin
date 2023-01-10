<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use App\Models\MVideo;
use Illuminate\Http\Request;

class viewclassController extends Controller
{
    public function getclassdata($id)
    {
        $class = new MClass();
        // $video = new MVideo();
        // $videodata = $video->get_videos($id);
        $videodata = MVideo::where("class_id", $id)->get();
        // dd($videodata);
        if (count($videodata) == 0) abort(404);

        foreach ($videodata as $value) {
            $value->TLectureNote;
        }

        $classdata = $class->get_classdata($id);

        $studentlistData = $class->forStudentList($id);

        return inertia("ViewClass", ['classdata' => $classdata, 'studentList' => $studentlistData, 'videos' => $videodata]);
    }
}
