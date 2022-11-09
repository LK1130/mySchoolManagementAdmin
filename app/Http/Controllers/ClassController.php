<?php

namespace App\Http\Controllers;

use App\Models\MClass;
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
    public function index()
    {
       $class=new MClass();
       $classdata=$class->get_class();
       return inertia("Class",['dclass' => $classdata]);
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
        settype($date1, "string");
        settype($date2, "string");
        settype($date3, "string");
        settype($date4, "string");
        settype($date5, "string");
        settype($date6, "string");
        settype($date7, "string");
        $date=$date1.$date2.$date3.$date4.$date5.$date6.$date7;
        $addclass=$class->addclass($request,$date);
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
        // $classdetail=$class->get_classdetail($id);
        return inertia("ViewClass",['classdata' => $id]);
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
