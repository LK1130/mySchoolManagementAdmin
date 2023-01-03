<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use App\Models\MVideo;
use App\Models\TLectureNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AddVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);

        $request->validate([
            'videoName' => "required",
            'description' => 'required',
            'date' => 'required',
            'storage' => 'required',
            'storagelocation' => 'required',
            'lecturename' => 'required'
        ]);

        $videoUpload = new MVideo();
        $videoUpload->v_name = $request->videoName;
        $videoUpload->v_description = $request->description;
        $videoUpload->v_date = $request->date;
        $videoUpload->v_storage_link = $request->storage;
        $videoUpload->v_storage_location = $request->storagelocation;
        $videoUpload->class_id = $request->classId;
        $videoUpload->save();


        $lectureUpload = [];
        for ($i = 0; $i < count($request->lecturename); $i++) {
            $ledb = new TLectureNote();
            $ledb->l_name = $request->lecturename[$i];
            if ($request->lecturefile[$i] && $request->astoragelink[$i] == null) {

                $file = $request->lecturefile[$i][0];
                // dd($file);
                $fileupload = $file->storePublicly("Leacture", ['disk' => 'public']);
                $ledb->l_storage_link = $fileupload;

                // dd($fileupload);
            } else if ($request->astoragelink[$i] && !$request->lecturefile[$i]) {
                $ledb->l_storage_link = $request->astoragelink[$i];
                $ledb->l_storage_location = $request->lecturelocation[$i];
            }
            array_push($lectureUpload, $ledb);
        }
        $videoUpload->TLectureNote()->saveMany($lectureUpload);
        return Redirect::route("class.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new MClass();
        $classData = $model->getClasses($id);
        return inertia('AddVideo', ['classDdata' => $classData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
