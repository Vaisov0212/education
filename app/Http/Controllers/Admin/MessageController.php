<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Message;
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
        return view('admin.message.index',compact('messages','links'));
    }



    public function show($id)
    {
        $message=Message::findOrFail($id);
        $message->update([
                'appReport'=>true
        ]);
        return view('admin.message.show', compact('message'));

    }


    public function destroy($id)
    {
        $message=Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('delete','Malumot o`chirildi');
    }
}
