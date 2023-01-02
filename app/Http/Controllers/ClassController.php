<?php

namespace App\Http\Controllers;

use App\Models\MClass;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Nette\Utils\Strings;
use PhpParser\Node\Expr\Cast\String_;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $checked = $request->selectedItem;
        $sorting = $request->sorting;
        $class=new MClass();
        $classdata = ($request->selectedItem) ?
        $class->get_class(explode("-", $checked))
        : $class->get_class("",$sorting );
       $category=$class->category();
       return inertia("Class",['dclass' => $classdata,'sorttype'=>"status",'categories'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = new MClass();
        $instructors= $class->get_instructors();
        $categories= $class->get_category();
        $students= $class->get_student();
    
        return inertia("AddClass",['instructor' => $instructors,'category' => $categories,'student' => $students ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new MClass();
        $date1=$request->input('day1');
        $date2=$request->input('day2');
        $date3=$request->input('day3');
        $date4=$request->input('day4');
        $date5=$request->input('day5');
        $date6=$request->input('day6');
        $date7=$request->input('day7');
        $studentids=$request->input('students');
        $img=$request->file('classimage');
        $saveimg = $img->store('Classphoto');
        settype($date1, "string");
        settype($date2, "string");
        settype($date3, "string");
        settype($date4, "string");
        settype($date5, "string");
        settype($date6, "string");
        settype($date7, "string");
        $date=$date1.$date2.$date3.$date4.$date5.$date6.$date7;
        $addclass=$class->addclass($request,$date,$saveimg,$studentids);
        return redirect('class');
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
        $class = new MClass();
        $classdetail=$class->get_classdetail($id);
        $instructors= $class->get_instructors();
        $categories= $class->get_category();
        $students= $class->get_student();
        $studentsid=$class->get_studentid($id);
        $date=$class->get_classdate($id);
        $day=$date->c_day;
        return inertia("EditClass",['classdata' => $classdetail,'instructor' => $instructors,'category' => $categories,'student' => $students ,"day"=>$day,"studentsids"=>$studentsid]);
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
        $class = new MClass();
        $date1=$request->input('day1');
        $date2=$request->input('day2');
        $date3=$request->input('day3');
        $date4=$request->input('day4');
        $date5=$request->input('day5');
        $date6=$request->input('day6');
        $date7=$request->input('day7');
        $studentids=$request->input('students');
        $img=$request->file('classimage');
        $saveimg = $img->store('Classphoto');
        settype($date1, "string");
        settype($date2, "string");
        settype($date3, "string");
        settype($date4, "string");
        settype($date5, "string");
        settype($date6, "string");
        settype($date7, "string");
        $date=$date1.$date2.$date3.$date4.$date5.$date6.$date7;
        $editclass=$class->editclass($request,$date,$saveimg,$studentids,$id);
        return redirect('class');
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
