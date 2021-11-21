<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $table='teachers';
    public $fillable=[
        'name',
        'profession',
        'about',
        't_img'
    ];
}
