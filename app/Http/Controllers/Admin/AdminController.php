<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Message;
use App\User;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.dashboard',compact('smsMessage','smsContact'));
    }

}
