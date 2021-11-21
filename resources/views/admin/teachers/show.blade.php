<?php $title="Xodmilar"; ?>
@include('admin.layouts.header')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.teachers.index')}}">Xodimlar</a></li>
        </ol>
    </div><!--/.row-->
    <br><br><br><br><br><br>
<div class="row" style="margin: 10px">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <div class="panel panel-default">
				<div class="panel-heading">Xodmin haqida to'liq malumotlar</div>
					<div class="panel-body">
                        <div class="card mb-3" >
                            <div class="row g-0">
                              <div class="col-md-4">
                                <img width="300px" src="../../storage/app/public/thumb/{{$teacher->t_img}}"   class="img-fluid rounded-start" alt="rasm">
                              </div>
                              <div class="col-md-8">
                                <div class="card-body">
                                  <h5 class="card-title">F.I.Sh:  {{$teacher->name}}</h5>
                                  <p class="card-text">Ma'lumot:  {{$teacher->about}}</p>
                                  <p class="card-text">Mutaxasisligi: {{$teacher->profession}}</p>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>
            </div>
        </div>
    </div>
</div>
<div style="text-align: right; padding-right:50px; margin:20px;">
    <a href="{{route('admin.teachers.index')}}" class="btn btn-sm btn-primary">qaytish</a>
</div>
@include('admin.layouts.footer')
