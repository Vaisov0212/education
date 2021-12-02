<?php $title="Kurslar";?>

@include('admin.layouts.header')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.course.index')}}" >Kurslar</a></li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            @if(count($errors) > 0 )
            <div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
                <ul>
                     @foreach($errors->all() as $error )
                     <li>{{$error }} </li>
                     @endforeach

               </ul>
              </div>

            @endif
            @if(\Session::has('success'))
                <div style="padding: 10px; text-align:center;">
                    <div class="alert alert-primary" role="alert"><i class=""></i>
                    {{\Session::get('success')}}
                    </div>
                </div>
            @endif
        </div>
    </div><!--/.row-->
    <div class="panel panel-default">
        <div class="panel-heading">Yangilash</div>
        <div class="panel-body">

                <form enctype="multipart/form-data" method="POST" action="{{route('admin.course.update',$course->id)}}" >
                    @method('PUT')
                     @csrf
                    <div class="form-group">
                        <label>kurs nomi:</label>
                        <input type="text" class="form-control" placeholder="kurs nomi" name="course_name" value="{{$course->course_name}}">
                    </div>
                    <div class="form-group">
                        <label>Kurs vaqti:</label>
                        <input class="form-control" placeholder="Kurs vaqti:" name="course_time" value="{{$course->course_time}}">
                    </div>


                    <div class="form-group">
                        <label>To'la matni</label>
                        <textarea class="form-control" name="about" rows="3" >{{$course->about}}</textarea>
                    </div>
                    <div class="form-group">
                            <label>rasm yuklash</label>
                        <input class="btn btn-sm btn-default" type="file" name="course_img"  >
                        <p class="help-block">joriy rasm xajimi 2mb dan oshmasliki zarur</p>
                    </div>

                    <div class="col-md-6">
                        <button  type="submit" class="btn btn-primary" >saqlash</button>
                    </div>

                </form>

        </div>
    </div><!-- /.panel-->
</div><!-- /.col-->

@include('admin.layouts.footer')

