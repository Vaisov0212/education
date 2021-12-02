<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Post;
use App\Message;
use App\Teacher;
use App\Course;
use App\Contact;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
        public function index(){
            $smsMessage=Message::where('appReport','=', false)->get()->count();
            $smsContact=Contact::where('report','=', false)->get()->count();
            $courses=Course::orderBy('id','desc')->latest()->paginate(15);
            $links=$courses->links();
            return view('admin.course.index', compact('links','smsMessage','smsContact','courses'));
        }

        public function create(){
            $smsMessage=Message::where('appReport','=', false)->get()->count();
            $smsContact=Contact::where('report','=', false)->get()->count();
            return view('admin.course.create',compact('smsContact','smsMessage'));
        }

        public function store(Request $request){
            // dd($request);
            $this->validate($request,[
                'course_name'=>'required',
                'course_time'=>'required',
                'about'=>'required',
                'course_img'=>'required'
            ]);

            $new_name="images".microtime().".jpg";
            $img=Image::make($request->file('course_img'));

           //  images watermake
             $watermark = Image::make('logo.png');

             $img->insert($watermark, 'bottom-right');
             $img->save('storage/app/public/course/'.$new_name);

             //image resize
           $img->fit(360, 280, function($constraint){
             $constraint->aspectRatio();
         })->save('storage/app/public/thumb/'.$new_name);

         $courses=new Course([
            'course_name'=>$request->get('course_name'),
            'course_time'=>$request->get('course_time'),
            'about'=>$request->get('about'),
            'course_img'=>$new_name
         ]);
         $courses->save();
         return redirect()->back()->with('success','Malumot saqlandi !');

        }

        public function show($id){
            $course=Course::findOrFail($id);
            $smsMessage=Message::where('appReport','=', false)->get()->count();
            $smsContact=Contact::where('report','=', false)->get()->count();
            return view('admin.course.show',compact('smsContact','smsMessage','course'));
        }

        public function edit( $id){
            $course=Course::findOrFail($id);
            $smsMessage=Message::where('appReport','=', false)->get()->count();
            $smsContact=Contact::where('report','=', false)->get()->count();
            return view('admin.course.edit',compact('course','smsMessage','smsContact'));

        }

        public function update(Request $request, $id){

            $course=Course::findOrFail($id);
            $request->validate([
                'course_name'=>'required',
                'course_time'=>'required',
                'about'=>'required'
            ]);


            if(!empty($request->file('course_img')))
            {
                Storage::disk('public')->delete('course/'.$course->course_img);
                Storage::disk('public')->delete('thumb/'.$course->course_img);

                $new_name="images".microtime().".jpg";
                 $img=Image::make($request->file('course_img'));

                 //  images watermake
                  $watermark = Image::make('logo.png');

                $img->insert($watermark, 'bottom-right');
                 $img->save('storage/app/public/course/'.$new_name);

                 //image resize
                 $img->fit(360, 280, function($constraint){
                 $constraint->aspectRatio();
                 })->save('storage/app/public/thumb/'.$new_name);

            }

         else{
              $new_name=$course->course_img;
             }

             $course->update([
                     'course_name'=>$request->post('course_name'),
                     'course_time'=>$request->post('course_time'),
                     'about'=>$request->post('about'),
                     'course_img'=>$new_name,

             ]);
             return redirect()->route('admin.course.index')->with('success','Maqola muofaqiyatli yangilandi');
     }

            public function destroy($id){

                $course=Course::findOrFail($id);
                // dd($course);
                Storage::disk('public')->delete('course/'.$course->course_img);
                Storage::disk('public')->delete('thumb/'.$course->course_img);
                $course->delete();

                return redirect()->route('admin.course.index')->with('delete','Malumotlar O`chirildi !');

            }

}
