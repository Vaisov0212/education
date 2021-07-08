<?php $title="Sorovlar"; ?>
@include('admin.layouts.header')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.message.index')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.posts.index')}}">So'rovlar</a></li>
        </ol>
    </div><!--/.row-->
    <br><br><br><br><br><br>
<div class="row" style="margin: 10px">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <div class="panel panel-default">
				<div class="panel-heading">Xabbar to'liq maatni</div>
					<div class="panel-body">
                        <div style="displey: flex;">

                      <br>
                      <div style="padding-left: 50px; padding-right:50px"><b>Ism:</b>      {{$message->first_name}} </div>
                      <br>
                      <div style="padding-left: 50px; padding-right:50px"><b>Familya:</b>  {{$message->last_name}} </div>
                      <br>
                      <div style="padding-left: 50px; padding-right:50px"><b>Kurs nomi:</b> {{$message->coourse}} </div>
                      <br>
                      <div style="padding-left: 50px; padding-right:50px"><b>Telfon raqam:</b>s   {{$message->phone}} </div>
                      <hr>
                      <div style="text-align: right; padding-right:50px"> {{$message->created_at->format("d M Y  H:m")}}</div>

                    </div>

                    </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: right; padding-right:50px; margin:20px;">
    <a href="{{route('admin.message.index')}}" class="btn btn-sm btn-primary">qaytish</a>
</div>
@include('admin.layouts.footer')
