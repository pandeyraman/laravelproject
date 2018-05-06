<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
    protected $fillable =[
        'class_no'
    ];


    public function students(){
        return $this->belongsToMany(Student::class,'student_grades','grades_id','students_id');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class,'subject_grade','grades_id','subjects_id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teacher_grade','grades_id','teachers_id');

    }

}
