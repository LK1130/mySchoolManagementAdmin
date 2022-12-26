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
        // dd(count($request->steptitle));
        $addguide = new MGuide();
        $addguide->addData($request);
        // for ($i=0; $i < count($request->steptitle); $i++) { 
        //     $addstep  = new  MGuideStep();
        // $addstep->addStep($request->steptitle[$i]);
        // $addstep->addStep($request->description[$i]);
        // $addguide->addStep((int)$i);
        // }
        $data = $addguide->getLastData($request->guidetitle);
        // dd($data);
        $addstep  = new  MGuideStep();
        $addstep->addStep($request,$data[0]->id);

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
        $guides = new MGuide();
        $guidesInfo = $guides->searchById($id);

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
