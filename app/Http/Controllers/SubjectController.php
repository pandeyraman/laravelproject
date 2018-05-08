<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
        $subjects = Subject::all();
        return view('subject.index',compact('subjects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allgrades = Grade::all();
        return view('subject.create', compact('allgrades'));
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
        $subject = new  Subject();
        $subject->subject_name = $input['subject_name'];
        $subject->full_marks = $input['full_marks'];
        $subject->pass_marks = $input['pass_marks'];
        $subject->theory_marks = $input['theory_marks'];
        $subject->practical_marks = $input['practical_marks'];
        $subject->save();
        $subject->grades()->attach($input['grades_id']);
        return redirect('/subject/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        $gradeSubject = Expense::findOrFail($id);
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
        $subject=Subject::find($id);
        return view('subject.edit', compact('allgrades','subject','id'));
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
        $subject= Subject::findorfail($id);
        $input = $request->all();
        $meroid = $input['grades_id'];
        $subject->update($input);
        $subject->grades()->sync($meroid);
        return redirect('subject/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject= Subject::findorfail($id);
        $subject->delete();
        $subject->grades()->detach();
        return redirect('subject/index');     }
}
