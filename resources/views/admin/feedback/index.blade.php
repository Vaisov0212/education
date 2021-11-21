<?php $title="Xabarlar" ?>

@include('admin.layouts.header')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.feedback.index')}}">Xabarlar</a></li>
        </ol>
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
            <div class="panel-heading">Xabarlar ro'yhati </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <th >Mavzu</th>
                            <th>Ism, Famlya</th>
                            <th width="180px">e-mail</th>
                            <th width="80px"> vaqti</th>
                            <th width="80px" >Amallar</th>


                        </thead>
                         <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                               <td>{{$feedback->subject}}</td>
                               <td>{{$feedback->name}}</td>
                               <td>{{$feedback->email}}</td>
                               <td>{{$feedback->created_at->format("Y/m/d  H:m")}}</td>
                               <td>
                                    <div style="display:flex; padding-top: 10px; padding-bottom:10px;">
                                        <a href="{{route('admin.feedback.show',$feedback->id)}}" style="margin-left: 5px" class="btn btn-sm btn-warning">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{route('admin.feedback.destroy', $feedback->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button style="margin-left: 5px" class="btn btn-sm btn-danger">
                                             <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        @if($feedback->report===1)
                                        <a style="margin-left: 5px" class="btn btn-sm btn-success">
                                            <i class="fa fa-check"></i>
                                        </a>
                                        @endif
                                        @if($feedback->report===0)
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
