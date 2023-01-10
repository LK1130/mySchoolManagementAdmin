<?php

namespace App\Http\Controllers;

use App\Mail\StudentAccountCreate;
use App\Models\MStudent;
use App\Models\TStudentAttendance;
use App\Models\TStudentClass;
use App\Models\TStudentExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

function generate()
{
    $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!#$%&*+';

    $randString = "";

    for ($i = 0; $i < 8; $i++) {
        $index =  rand(0, strlen($char) - 1);
        $randString .= $char[$index];
    }

    return $randString;
}

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request->search;
        $checked = $request->selectedItem;
        // dd($request->all());

        // if($request.)
        // dd($checked);
        $model1 = new MStudent();
        $category = $model1->category();

        $tmpCheck = [];
        foreach ($category as $key => $value) {
            array_push($tmpCheck, $value->id);
        }

        if ($checked == "0")
            $data = $model1->allStuents([0]);
        else
            $data = ($request->selectedItem) ? $model1->allStuents(explode("-", $checked)) : $model1->allStuents("", $search);


        // dd($data);
        // typeOf($checked);
        return Inertia::render('Student', [
            'allStudents' => $data,
            'filter' => $search,
            'categories' => $category,
            'checkBox' => ($checked == "") ? $tmpCheck : explode("-", $checked),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia("AddStudent");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4|max:15',
            'email' => "required|unique:users,email|email"
        ]);

        // dd($request->email);
        $password = generate();
        $data = [
            'email' => $request->email,
            'password' => $password,
        ];

        // dd($password);
        Mail::to($request->email)->send(new StudentAccountCreate($data));
        $model = new MStudent();
        $model->studentAccount($request, $password);
        return Redirect::route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new MStudent();
        $studenProfile = $model->studnetDetailandClasses($id);
        // dd($studenProfile);
        // if ($studenProfile[0]->Class == null) abort(404);

        $classes = new TStudentClass();
        $exam   = new TStudentExam();
        $attendances = new TStudentAttendance();

        $allUserRank = [];
        $allClass = [];

        $oneExamCallRank = [];

        //get ALl classid
        $allClassID = [];

        $oneClassRank = [];

        $oneClassEachExamRank = [];

        //get attendance  
        $attendance  = $attendances->getAttendance($id);
        $examPercent = $exam->getExamRankPercent($id);

        //get Exam List
        $examList = $exam->getExamList();

        //get Class List
        $totalClass = $classes->totalClass($id);

        //loop for each examid 
        foreach ($examList as  $examid) {
            //collect all data to array


            $allUserRank = array_merge($allUserRank, $exam->showRankTable($examid));
        }

        //loop for each classid rank
        foreach ($totalClass as $classid) {


            $oneClassEachExamRank = array_merge($oneClassEachExamRank, $exam->getExamlistByClassID($classid->class_id));
            $oneClassRank = array_merge($oneClassRank, $exam->getUserRankById($classid->class_id));
        }

        //filter for get only current login user id
        // dd($id);
        $examRank = array_filter($allUserRank, function ($rank) use ($id) {
            return ($rank->id == $id);
        });

        //filter for get only current login user id
        $eachExamRank = array_filter($oneClassEachExamRank, function ($rank) use ($id) {

            return ($rank->uid == $id);
        });

        $newArray = array_values($eachExamRank);


        for ($i = 0; $i < count($newArray); $i++) {
            if (!in_array($newArray[$i]->cid, $allClassID)) {
                array_push($allClassID, $newArray[$i]->cid);
            }
        }

        for ($i = 0; $i < count($allClassID); $i++) {
            $temp = [];
            for ($j = 0; $j < count($newArray); $j++) {
                if ($allClassID[$i] == $newArray[$j]->cid) {
                    array_push($temp, $newArray[$j]);
                }
            }

            array_push($oneExamCallRank, $temp);
        }

        //get all user rank
        $userRanks = $exam->getUserRank();

        //filter for get only current login user id
        $userRank = array_filter($userRanks, function ($ranking) use ($id) {
            return ($ranking->id == $id);
        });

        // dd($userRank);

        //filter for get overall rank only current login user id
        $overallRank = array_filter($oneClassRank, function ($ranking) use ($id) {
            return ($ranking->id == $id);
        });

        foreach ($totalClass  as $class) {
            array_push($allClass, $class->id);
        }

        $classid =  join(',', $allClass);

        $eachClass =   $classes->totalStudents($classid);


        return inertia('StudentView', [
            'studenProfile' => $studenProfile,
            'classes' => $totalClass,
            'attendance' => $attendance,
            'examRanks' => $examRank,
            'rank_mark' => $userRank,
            'all_ranks' => $userRanks,
            'one_class' => $eachClass,
            'exam_percent' =>  $examPercent,
            'overall_rank' => $overallRank,
            'class_rank'  => $oneExamCallRank
        ]);
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
