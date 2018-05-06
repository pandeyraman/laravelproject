<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teachers";
    protected $fillable = [
        'teacher_name',
        'contact',
        'email',
        'address',
    ];

    public function subjects(){
        return $this->belongsToMany(Subject::class,'teacher_subjects','teachers_id','subjects_id');
    }

    public function grades(){
        return $this->belongsToMany(Grade::class,'teacher_grade','teachers_id','grades_id');

    }
}
