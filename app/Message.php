<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table='messeges';
    public $fillable=[
        'first_name',
        'last_name',
        'course',
        'phone',
        'appReport'
    ];
}
