<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Message;
class FeedbackController extends Controller
{

    public function index()
    {

        $feedbacks=Contact::latest()->paginate(20);
        $links=$feedbacks->links();

        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin/feedback/index', compact('feedbacks','links','smsMessage','smsContact'));

    }

    public function show($id)
    {
        $feedback=Contact::findOrFail($id);
        $feedback->update([
            'report'=>true
        ]);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.feedback.show', compact('feedback','smsMessage','smsContact'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $feedback=Contact::findOrFail($id);
        $feedback->delete();
        return redirect()->back()->with('delete','Ochirildi...');
    }
}
