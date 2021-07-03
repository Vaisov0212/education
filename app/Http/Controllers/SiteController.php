<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SiteController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function about(){
        return view('about-us');
    }

    public function contact(){
        return view('contact-us');
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
