<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    protected  $table = "students_marks";
    protected $fillable=[
      'students_id',
      'subjects_id',
        'marks',
    ];
}
