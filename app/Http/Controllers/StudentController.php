<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Student;
use App\StudentMarks;
use Illuminate\Http\Request;

class StudentController extends Controller
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
        $students = Student::all();

        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allgrades = Grade::all();
        return view('student.create', compact('allgrades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'roll_no' => 'required | unique:students',
            'name' => 'required | string',
        ]);


        $input = $request->all();
        $student = new  Student();
        $student->name = $input['name'];
        $student->roll_no = $input['roll_no'];
        $student->save();
        $student->grades()->attach($input['grades_id']);
        return redirect('/student/index');


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
        $allgrades = Grade::all();
        $student=Student::find($id);
        return view('student.edit', compact('allgrades','student','id'));
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
        $student= Student::findorfail($id);
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
        $student = Student::find($id);
        $student->delete();
        $student->grades()->detach();
        return redirect('student/index');
    }

    public function showmarks($id){
        $studentmarks = StudentMarks::where('students_id','=',$id)->get();
        return view('student.show',compact('studentmarks'));
    }
}
