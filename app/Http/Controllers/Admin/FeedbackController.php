<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
class FeedbackController extends Controller
{

    public function index()
    {

        $feedbacks=Contact::latest()->paginate(20);
        $links=$feedbacks->links();
        return view('admin/feedback/index', compact('feedbacks','links'));

    }

    public function show($id)
    {
        $feedback=Contact::findOrFail($id);
        $feedback->update([
            'report'=>true
        ]);
        return view('admin.feedback.show', compact('feedback'));
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
