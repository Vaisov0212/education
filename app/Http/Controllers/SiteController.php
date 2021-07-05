<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contact;
class SiteController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about(){
        return view('about-us');
    }

    public function contact_us(){
        return view('contact-us');
    }

    public function contact(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
    ]);
        $contact=new Contact([
            'name'=>$request->post('name'),
            'email'=>$request->post('email'),
            'subject'=>$request->post('subject'),
            'message'=>$request->post('message'),
            'report'=>false
        ]);
        $contact->save();
        return redirect()->back()->with('success','Xabar muofaqiyatli jo`natildi');
    }

    public function blog(){
        $posts=Post::orderBy('id','desc')->latest()->paginate(12);
        $links=$posts->links();
        return view('blog', compact('posts','links'));
    }

    public function show($id)
    {
        $post=Post::findOrFail($id);
        $fours=Post::orderBy('views','asc')->limit(5)->get();
        return view('show',compact('post','fours'));
    }

}
