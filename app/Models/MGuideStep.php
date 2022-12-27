<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MGuideStep extends Model
{
    use HasFactory;

    public function addStep($request, $guideid){

        // return DB::table('m_guide_steps')
        //         ->insert([
        //             'step' => $request->step,
        //             'step_title'=>$request->steptitle,
        //             'step_description' => $request->description
        //         ]);

                
        // dd($request);
        
        for ($i=0; $i < count($request->steptitle); $i++) { 
            //     $addstep  = new  MGuideStep();
            // $addstep->addStep($request->steptitle[$i]);
            // $addstep->addStep($request->description[$i]);
            // $addguide->addStep((int)$i);
            // dd($request->steptitle);
            $step = new MGuideStep();
        $step->guide_id = $guideid;
        $step->step = $i+1;
        $step->step_title = $request->steptitle[$i];
        $step->step_description = $request->description[$i];
        // dd($request->steptitle[$i]);
        $step->save();
        }
    }
}
