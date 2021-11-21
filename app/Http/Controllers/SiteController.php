<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Contact;
use App\Message;
use App\Teacher;
use App\Services\SendTelegramService;
class SiteController extends Controller
{

    public function index()
    {
        $teachers=Teacher::all();
        $fri=Post::orderBy('id','asc')->limit(3)->get()    ;
        return view('index',compact('fri','teachers'));
    }

    public function about(){
        $teachers=Teacher::all();
        return view('about-us',compact('teachers'));
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
    // dd($request);
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
        $post->increment('views');
        return view('show',compact('post','fours'));
    }

    public function appStore(Request $request){

       $data=$request->validate([
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'course'=>'required',
            'phone'=>'required|min:9|max:9'
        ]);

        $message='Ism: '.$data['first_name'].PHP_EOL;
        $message.='Familya: '.$data['last_name'].PHP_EOL;
        $message.='Kurs nomi: '.$data['course'].PHP_EOL;
        $message.='Tel: +998'.$data['phone'];


        Message::create([
        'first_name'=>$data['first_name'],
        'last_name'=>$data['last_name'],
        'course'=>$data['course'],
        'phone'=>'+998'.$data['phone'],
        'appReport'=>false
       ]);

        // send to telegram
        SendTelegramService::send($message);

       return redirect()->back()->with('success','Sorov yuborildi tez orada xodimlarimiz siz bilan bg`lanadi.');

    }

}
