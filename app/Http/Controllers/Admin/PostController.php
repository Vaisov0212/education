<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.posts.index');
    }
    public function create(){
        return view('admin.posts.create');
    } 
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'subject'=>'required',
            'text'=>'required',
            'select_file'=>'required|file|mimes:jped,jpg,png'
        ]);

        $new_name=$request->post('select_file');

        $post=new Post([
            'name'=>$request->post('name'),
            'subject'=>$request->post('subject'),
            'img'=>$request->post('img'),
            'text'=>$request->post('text'),
            'views'=>0
        ]);
        $post->save();
        return redirect()->back()->with('success','Malumotlar saqlandi !');
    }

}
