<?php

namespace App\Http\Controllers;

use App\Grade;
use App\StudentMarks;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $teacher_id  = Auth::user()->id;
        $teacher = Teacher::findOrFail($teacher_id);
        return view('teacher.teacherdashboard',compact('teacher'));
    }

    public function showgradestudents($id,$gid){
        $grade = Grade::findOrFail($id);
        $subject = Subject::findOrFail($gid);
        return view('teacher.entermarks',compact('grade','subject'));
    }

    public function savemarks(Request $request){
        $input = $request->all();
        $subject_id = $input['subject_id'];

        $main_array= [];
        foreach ($input['alldata'] as $fuckdata){
            $fuckdata['subjects_id'] = $subject_id;
            array_push($main_array, $fuckdata);
        }
        StudentMarks::insert($main_array);
        return redirect('/teacherdashboard/index');

    }
}
