<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable =[
        'name',
        'roll_no'
    ];

    public function grades(){
        return $this->belongsToMany(Grade::class,'student_grades','students_id','grades_id');
    }
}
