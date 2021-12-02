<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Message;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=auth()->user()->id;
        $user=User::findOrFail($id);
        $smsMessage=Message::where('appReport','=', false)->get()->count();
        $smsContact=Contact::where('report','=', false)->get()->count();
        return view('admin.profile.index',compact('smsMessage','smsContact','user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=auth()->user()->id;
        $this->validate($request,[
            'file'=>'required'
        ]);
        $new_name=microtime().".jpg";
        $img=Image::make($request->file('file'));
        $img->fit(360, 280, function($constraint){
            $constraint->aspectRatio();
            })->save('storage/app/public/thumb/'.$new_name);
            $user=User::findOrFail($id);
            $user->update([
                'userImg'=>$new_name
            ]);
        return redirect()->back()->with('success','Rasm yuklandi !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $request->validate([
                'name'=>'required|min:3',
                'email'=>'required|email',
                'password1'=>'required|min:8',
                'password2'=>'required|min:8'
            ]);
            if($request->get('password1')===$request->get('password2')){
                $user=User::findOrfail($id);
                $user->update([
                    'name'=>$request->get('name'),
                    'email'=>$request->get('email'),
                    'password'=>Hash::make($request->get('password1')),
                ]);
                return redirect()->back()->with('success','Malumotlar yangilandi !');
            }
            else{
                return redirect()->back()->with('error','xato xabar qaytadan urining !');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    protected function getUser(){
        $id=auth()->user()->id;
        return User::findOrFail($id);
    }
}
