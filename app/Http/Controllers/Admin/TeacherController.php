<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Message;
use App\Teacher;
use App\Contact;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::orderBy('id','desc')->latest()->paginate(15);
        $links=$teachers->links();
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();

        return view('admin.teachers.index',compact('teachers','links','smsMessage','smsContact'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.teachers.create',compact('smsMessage','smsContact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'profession'=>'required',
            'about'=>'required',
            't_img'=>'required'
        ]);
        $new_name="images".microtime().".jpg";
        $img=Image::make($request->file('t_img'));

       //  images watermake
         $watermark = Image::make('logo.png');

         $img->insert($watermark, 'bottom-right');
         $img->save('storage/app/public/teachers/'.$new_name);

         //image resize
       $img->fit(360, 280, function($constraint){
         $constraint->aspectRatio();
     })->save('storage/app/public/thumb/'.$new_name);

        $teacher=new Teacher([
            'name'=>$request->get('name'),
            'profession'=>$request->get('profession'),
            'about'=>$request->get('about'),
            't_img'=>$new_name
        ]);
        $teacher->save();
        return redirect()->back()->with('success','Malumotlar saqlandi !');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=Teacher::findOrFail($id);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.teachers.show', compact('teacher','smsMessage','smsContact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher=Teacher::findOrFail($id);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.teachers.edit', compact('teacher','smsMessage','smsContact'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher=Teacher::findOrFail($id);
        $this->validate($request,[
            'name'=>'required',
            'profession'=>'required',
            'about'=>'required'
        ]);

        if(!empty($request->file('t_img')))
        {
            Storage::disk('public')->delete('teachers/'.$teacher->t_img);
            Storage::disk('public')->delete('thumb/'.$teacher->t_img);

            $new_name="images".microtime().".jpg";
             $img=Image::make($request->file('t_img'));

             //  images watermake
              $watermark = Image::make('logo.png');

            $img->insert($watermark, 'bottom-right');
             $img->save('storage/app/public/teachers/'.$new_name);

             //image resize
             $img->fit(360, 280, function($constraint){
             $constraint->aspectRatio();
             })->save('storage/app/public/thumb/'.$new_name);

        }

     else{
          $new_name=$teacher->t_img;
         }
         $teacher->update([
             'name'=>$request->post('name'),
             'profession'=>$request->post('profession'),
             'about'=>$request->post('about'),
             't_img'=>$new_name
         ]);
         return redirect()->route('admin.teachers.index')->with('success','Malumotlar saqlandi !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher=Teacher::findOrFail($id);
        Storage::disk('public')->delete('posts/'.$teacher->t_img);
        Storage::disk('public')->delete('thumb/'.$teacher->t_img);
        $teacher->delete();
        return redirect()->back()->with('delete','Malumot o`chirildi');
    }
}
