<?php $title="xabarlar"; ?>
@include('admin.layouts.header')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.feedback.index')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.posts.index')}}">Xabarlar</a></li>
        </ol>
    </div><!--/.row-->
<div class="row" style="margin: 10px">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <div class="panel panel-default">
				<div class="panel-heading">{{$feedback->name}}</div>
					<div class="panel-body">
                        <div style="displey: flex;">
                      <div> <b>{{$feedback->subject}}</b></div>
                      <br>
                      <div style="padding-left: 50px; padding-right:50px"> {{$feedback->message}} </div>
                      <hr>
                      <div style="text-align: right; padding-right:50px"> {{$feedback->created_at->format("Y/m/d H:m")}}</div>

                    </div>

                    </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: right; padding-right:50px; margin:20px;">
    <a href="{{route('admin.feedback.index')}}" class="btn btn-sm btn-primary">qaytish</a>
</div>
@include('admin.layouts.footer')
