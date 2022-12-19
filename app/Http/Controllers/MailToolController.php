<?php

namespace App\Http\Controllers;

use App\Mail\AlertMail;
use App\Mail\DirectMessageMail;
use App\Mail\InformationMail;
use App\Models\MClass;
use App\Models\MStudent;
use App\Models\TMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Monolog\Handler\PushoverHandler;

class MailToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = TMail::where("del_flg", 0)
            ->orderBy('updated_at','desc')
            ->paginate(15);
        return inertia('MailTool', ['mails' => $mails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getStudents = new MStudent();
        $students = $getStudents->getStudents();

        $classes = MClass::where('del_flg', 0)->get();

        // dd($classes);

        return inertia('AddMail', [
            'students' => $students,
            'classes' => $classes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mail = new TMail();

        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];
        if ($request->student == null) {
            $mailArray = [];
            

            $allMails = $mail->getEmails($request->class);
            for ($i = 0; $i < count($allMails); $i++) {
                array_push($mailArray, $allMails[$i]->email);
            }

            if ($request->category == 1) {
                Mail::to($allMails)->send(new InformationMail($data));
            } else if ($request->category == 2) {
                Mail::to($allMails)->send(new DirectMessageMail($data));
            } else if ($request->category == 3) {
                Mail::to($allMails)->send(new AlertMail($data));
            }

            $mail->insertClassMail($request);

            return Redirect::route('mailtool.index');
        } else {

            $user = User::find($request->student);
            $userMail = $user->email;

            if ($request->category == 1) {
                Mail::to($userMail)->send(new InformationMail($data));
            } else if ($request->category == 2) {
                Mail::to($userMail)->send(new DirectMessageMail($data));
            } else if ($request->category == 3) {
                Mail::to($userMail)->send(new AlertMail($data));
            }
            $mail->insertStudentMail($request);

            return Redirect::route('mailTool.index');
        }
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
