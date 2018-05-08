<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Subject;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $teachers = Teacher::all();
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fetchsubject(Request $request){
        $input = $request->all();
        $grades = Grade::findOrFail($input['grades_id']);
        return view('teacher.create', compact('grades'));
    }

    public function create()
    {
        $allgrades = Grade::all();
        return view('teacher.create', compact('allgrades'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $grade = $input['grades_id'];
        $subject = $input['subjects_id'];
        $teacher = new  Teacher();
//        $checkGrade = Grade::where('id','=',$grade);
        $checkSubject = Subject::where('id','=',$subject)->first();
//        if($checkSubject == null) {
            $teacher->teacher_name = $input['teacher_name'];
            $teacher->address = $input['address'];
            $teacher->email = $input['email'];
            $teacher->contact = $input['contact'];

            $user = new User();
            $pass = 'abc123';
            $role = "teacher";
            $user->name = $teacher->teacher_name;
            $user->email = $teacher->email;
            $user->password = Hash::make($pass);
            $user->role = $role;
            $user->save();

            $teacher->save();
            $teacher->grades()->attach($input['grades_id']);
            $teacher->subjects()->attach($input['subjects_id']);
//        }
//        else{
//                Session::flash('status', 'Subject Already Assigned Exists!');
//            }

        return redirect('/teacher/index');

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
        $teacher= Teacher::findorfail($id);
        $input = $request->all();
        $student->update($input);
        $student->grades()->sync($request->input('grades_id'));
        return redirect('student/index');
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
