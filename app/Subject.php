<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = [
        'subject_name',
        'full_marks',
        'pass_marks',
        'theory_marks',
        'practical_marks',
    ];

    public function grades(){
        return $this->belongsToMany(Grade::class,'subject_grade','subjects_id','grades_id');
    }

    public function teachers(){
        return $this->belongsToMany(Subject::class,'teacher_subjects','subjects_id','teachers_id');

    }
}
