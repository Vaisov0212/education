<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Message;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.dashboard',compact('smsMessage','smsContact'));
    }

    public function profile(){
        $id=auth()->user()->id;
        $user=User::findOrFail($id);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.profile',compact('smsMessage','smsContact','user'));
    }

    protected function update(Request $request,$id)
    {

    }
    protected function getUser(){
        $id=auth()->user()->id;
        return User::findOrFail($id);
    }

}
