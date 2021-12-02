<?php $title="Kurslar";?>
@include('admin.layouts.header')



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.course.index')}}">Kurslar</a></li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            @if(session()->has('success'))
            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
                    {{session()->get('success')}}
                   </div>

            @endif
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            @if(session()->has('delete'))
            <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
                    {{session()->get('delete')}}
                   </div>

            @endif
        </div>
    </div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <div class="panel panel-default">
				<div style="text-align: right; padding:10px">
                        <a href="{{route('admin.course.create')}}" class="btn btn-sm btn-primary" >
                            <i style="padding: 5px" class="fa fa-pencil">
                            </i>qo'shsish
                        </a>
                    </div>
					<div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <th width="100px">Rasm</th>
                                <th width="240px">Ism Familya:</th>
                                <th >Mutaxasisligi</th>
                                <th width="40px">qo'shilgan vaqti</th>
                                <th width="80px" >Amallar</th>
                            </thead>
                             <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td>
                                        <img class="img img-thumbnail" width="80px" src="/storage/app/public/thumb/{{$course->course_img }}" alt="Rasm topilmadi!">
                                    </td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->course_time}}</td>
                                    <td>{{$course->created_at->format("Y/m/d H:i")}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default" style="display: flex; ">
                                                    <a style="margin-right: 5px;" class="btn btn-sm btn-success" href="{{route('admin.course.show', $course->id)}}"><i class="fa fa-eye"></i></a>
                                                 <a style="margin-right: 5px;" class="btn btn-sm btn-warning" href="{{route('admin.course.edit', $course->id)}}"><i class="fa fa-edit"></i></a>
                                                 <form  method="POST" action="{{route('admin.course.destroy',$course->id)}}" >
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" id="onDelete" name="button-1" aria-required="false"><i class="fa fa-trash"></i></button>
                                                   </form>
                                                </div>
                                           </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$links}}
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->


@include('admin.layouts.footer')
