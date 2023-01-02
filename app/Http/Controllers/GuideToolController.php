<?php

namespace App\Http\Controllers;

use App\Models\MGuide;
use App\Models\MGuideStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GuideToolController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $guides = MGuide::where("del_flg",0)
        ->paginate(5);
        foreach ($guides as $guide) {
            $guide->guideStep;
        }
        return inertia('GuideTool',['guides'=> $guides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Addguide');
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
            'guidetitle'=> 'unique:m_guides,g_title|required'
        ]);
        echo("<pre>");
        $addguide = new MGuide();
        $addguide->g_title = $request->guidetitle;
       // $addguide->save();
        var_dump($request->files[1]);
        $steps = [];
        for ($step=0; $step < count( $request->steptitle) ; $step++) { 
           $gStep = new MGuideStep();
           
           $file = $request->files->step_file[$steps][0];
           $guidephoto = $file->storePublicly("Guide", ['disk' => 'public']);
        //    dd($guidephoto);
           $gStep->step =  $step+1;
           $gStep->step_title =   $request->steptitle[$step];
           $gStep->step_description = $request->description[$step];
           $gStep->step_photo = $guidephoto;
           array_push($steps, $gStep);
        }

        $addguide->guideStep()->saveMany($steps);
        return Redirect::route('guideTool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guides = MGuide::find($id);
        $guides->guideStep;
        return inertia("EditGuide",["guideInfo"=> $guides]);
        // return $privacypolicysInfo;
        // return inertia('EditGuide',['guideInfo' => $guidesInfo]);
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
        $update =MGuide::find($id);
        $update->g_title = $request->guidetitle;
        $update->save();
        MGuideStep::where("guide_id",$id)->delete();

        $steps = [];
        for ($step=0; $step < count( $request->steptitle) ; $step++) { 
           $gStep = new MGuideStep();
           $gStep->step =  $step+1;
           $gStep->step_title =   $request->steptitle[$step];
           $gStep->step_description = $request->description[$step];
           array_push($steps, $gStep);
        }

        $update->guideStep()->saveMany($steps);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        
        $delguide = MGuide::find($id);
        $delguide->del_flg = 1 ;
        $delguide->save();
        MGuideStep::where("guide_id",$id)
            ->update(['del_flg'=>'1']);

        // $steps = [];
        // for ($step=0; $step < count( $request->steptitle) ; $step++) { 
        //    $gStep = new MGuideStep();
        //    $gStep->del_flg = 1 ;
        //    array_push($steps, $gStep);
        // }
        
            return Redirect::route("guideTool.index");
    }
}
