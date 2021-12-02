<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $table='courses';
    public $fillable=[
        'course_name',
        'course_time',
        'about',
        'course_img'
    ];
}
