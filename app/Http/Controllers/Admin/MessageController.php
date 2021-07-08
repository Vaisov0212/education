<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Message;
use App\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages=Message::latest()->paginate(20);
        $links=$messages->links();
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.message.index',compact('messages','links','smsMessage','smsContact'));
    }



    public function show($id)
    {
        $message=Message::findOrFail($id);
        $message->update([
                'appReport'=>true
        ]);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.message.show', compact('message','smsMessage','smsContact'));

    }


    public function destroy($id)
    {
        $message=Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('delete','Malumot o`chirildi');
    }
}
