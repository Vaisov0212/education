<?php $title="Sorovlar" ?>

@include('admin.layouts.header')
<div class="row">
    <div class="col-lg-12">
        @if(\Session::has('delete'))
            <div style="padding: 10px; text-align:center;">
                <div class="alert alert-danger" role="alert"><i class=""></i>
                {{\Session::get('delete')}}
                </div>
            </div>
        @endif
    </div>
</div><!--/.row-->

</div>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.feedback.index')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.posts.index')}}">So'rovlar</a></li>
        </ol>
    </div><!--/.row-->
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel panel-default">
            <div class="panel-heading">So'rovlar ro'yxati</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th >Ism</th>
                            <th>Familya</th>
                            <th width="180px">Kurs nomi</th>
                            <th width="180px">Telfon raqami</th>
                            <th width="80px"> vaqti</th>
                            <th width="80px" >Amallar</th>


                        </thead>
                         <tbody>
                            @foreach($messages as $item)
                            <tr>
                               <td>{{$item->first_name}}</td>
                               <td>{{$item->last_name}}</td>
                               <td>{{$item->course}}</td>
                               <td>{{$item->phone}}</td>

                               <td>{{$item->created_at->format("Y/m/d  H:m")}}</td>
                               <td>
                                    <div style="display:flex; padding-top: 10px; padding-bottom:10px;">
                                        <a href="{{route('admin.message.show',$item->id)}}" style="margin-left: 5px" class="btn btn-sm btn-warning">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{route('admin.message.destroy', $item->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="margin-left: 5px" class="btn btn-sm btn-danger">
                                             <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @if($item->report===1)
                                        <a style="margin-left: 5px" class="btn btn-sm btn-success">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        @endif
                                        @if($item->report===0)
                                        <a style="margin-left: 5px" class="btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                        </a>
                                        @endif
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
