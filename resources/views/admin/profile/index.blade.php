<?php
$title="Sozlamalar";
?>
@include('admin/layouts/header')
<style>
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }</style>


<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"> <em class="fa fa-home"></em></a></li>
            <li class="active"><a href="{{route('admin.teachers.index')}}">Xodimlar</a></li>
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
            @if(session()->has('error'))
            <div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
                    {{session()->get('error')}}
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
    @if(count($errors) > 0 )
    <div class="alert bg-warning" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>
        <ul>
             @foreach($errors->all() as $error )
             <li>{{$error }} </li>
             @endforeach

       </ul>
      </div>
    @endif
    </div>
</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <div class="panel panel-default">
<br>
<br>
<br>
                    <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                <img class="rounded-circle mt-5" width="150px" src="/storage/app/public/thumb/{{$user->userImg}}">
                                <span class="text-black-50"><br><br>{{$user->name}}</span>
                                <span> </span>
                                <br>
                                <br>
                                <br>
                                <form enctype="multipart/form-data" method="POST" action="{{route('admin.profile.store')}}"  >

                                    @csrf
                                <input type="file" name="file" class="btn btn-sm btn-success" placeholder="rasm">
                                <button style="margin:10px; " type="submit" class="btn btn-sm btn-warning">saqlash</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Xisobni taxrirlash</h4>
                                </div>
                                <form method="POST" enctype="multipart/form-data" action="{{route('admin.profile.update',$user->id)}}" >
                                    @csrf
                                    @method('PUT')
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label class="labels">ism:</label>
                                        <input name="name" type="text" class="form-control" placeholder="ism:" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">E-manzil</label>
                                        <input name="email" type="text" class="form-control" placeholder="E-manzil:" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">paro'l</label>
                                        <input name="password1" type="password" class="form-control" placeholder="paro'l:" required min="8">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="labels">qayta paro'l</label>
                                        <input name="password2" type="password" class="form-control" placeholder="paro'l:" required min="8">
                                    </div>
                                </div>
                                    <br>
                                    <br>
                                <div class="mt-5 text-center">
                                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                                </div>
                                <br>
                                <br>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                </div>
                </div>

				</div><!-- /.panel-->
			</div><!-- /.col-->


@include('admin/layouts/footer')
