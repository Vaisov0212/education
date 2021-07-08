<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Message;
use App\Contact;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function index(){
        $posts=Post::orderBy('id','desc')->latest()->paginate(15);
        $links=$posts->links();
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();

        return view('admin.posts.index',compact('posts','links','smsMessage','smsContact'));
    }
    public function create(){
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();

        return view('admin.posts.create',compact('smsMessage','smsContact'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'subject'=>'required',
            'text'=>'required',
            'select_file'=>'required|file|mimes:jpeg,jpg,png'
        ]);

        $new_name="images".microtime().".jpg";
        $img=Image::make($request->file('select_file'));

       //  images watermake
         $watermark = Image::make('logo.png');

         $img->insert($watermark, 'bottom-right');
         $img->save('storage/posts/'.$new_name);

         //image resize
       $img->fit(360, 280, function($constraint){
         $constraint->aspectRatio();
     })->save('storage/thumb/'.$new_name);

        $post=new Post([
            'name'=>$request->post('name'),
            'subject'=>$request->post('subject'),
            'img'=>$new_name,
            'text'=>$request->post('text'),
            'views'=>0
        ]);

        $post->save();
        return redirect()->back()->with('success','Malumotlar saqlandi !');
    }


    public function edit($id){
        $post=Post::findOrFail($id);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.posts.edit',compact('post','smsMessage','smsContact'));
    }

    public function update(Request $request, $id){
        $post=Post::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'text'=>'required'
        ]);


        if(!empty($request->file('select_file')))
        {
            Storage::disk('public')->delete('posts/'.$post->img);
            Storage::disk('public')->delete('thumb/'.$post->img);

            $new_name="images".microtime().".jpg";
             $img=Image::make($request->file('select_file'));

             //  images watermake
              $watermark = Image::make('logo.png');

            $img->insert($watermark, 'bottom-right');
             $img->save('storage/posts/'.$new_name);

             //image resize
             $img->fit(360, 280, function($constraint){
             $constraint->aspectRatio();
             })->save('storage/thumb/'.$new_name);

        }

     else{
          $new_name=$post->img;
         }

         $views=$post->views;
         $post->update([
                 'name'=>$request->post('name'),
                 'subject'=>$request->post('subject'),
                 'text'=>$request->post('text'),
                 'img'=>$new_name,
                 'views'=>$views
         ]);
         return redirect()->route('admin.posts.index')->with('success','Maqola muofaqiyatli yangilandi');
 }

        public function destroy($id){
            $post=Post::findOrFail($id);
            Storage::disk('public')->delete('posts/'.$post->img);
            Storage::disk('public')->delete('thumb/'.$post->img);
            $post->delete();

            return redirect()->route('admin.posts.index')->with('delete','Malumotlar O`chirildi !');

        }


}
