<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$title}}</title>
	<link href="/admin/css/bootstrap.min.css" rel="stylesheet">
	<link href="/admin/css/font-awesome.min.css" rel="stylesheet">
	<link href="/admin/css/datepicker3.css" rel="stylesheet">
	<link href="/admin/css/styles.css" rel="stylesheet">

	<!--Custom Font-->
    {{-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=uzbekistan,urgench,amina&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://soap2day-to.com">soap2day</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> --}}
	{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> --}}
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" ><span>ST</span>AR</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info"  href="{{route('admin.message.index')}}">
					<em class="fa fa-envelope"></em>@if($smsMessage>0)<span class="label label-danger">{{$smsMessage}}</span>@endif
					</a>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info"   href="{{route('admin.feedback.index')}}">
						<em class="fa fa-bell"></em>@if($smsContact>0)<span class="label label-info">{{$smsContact}}</span>@endif
					</a>
					</li>
                    <li class="dropdown">
						<form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary" style="padding:10px;" > <i  class="fa fa-power-off" style="margin:2px"></i> </button>
                        </form>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="/storage/app/public/user.png" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Admin</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li  class="@if($title=="Uy") active  @endif "  ><a href="{{route('admin.dashboard')}}"><em class="fa fa-dashboard">&nbsp;</em> Uy Sahifa</a></li>
			<li @if($title=='Sorovlar') class="active"@endif  ><a href="{{route('admin.message.index')}}"><em class="fa fa-comments">&nbsp;</em> So'rovlar</a></li>
            <li class="@if($title=="Yangiliklar") active  @endif "  ><a href="{{route('admin.posts.index')}}"><em class="fa fa-navicon">&nbsp;</em> Yangiliklar</a></li>
            <li @if($title=='Kurslar') class="active"@endif  ><a href="{{route('admin.course.index')}}"><em class="fa fa-users "></em> Kurslar</a></li>
            <li @if($title=='Xodimlar') class="active"@endif  ><a href="{{route('admin.teachers.index')}}"><em class="fa fa-calendar"></em> Xodimlar</a></li>
			<li @if($title=='Xabarlar') class="active"@endif  ><a href="{{route('admin.feedback.index')}}"><em class="glyphicon glyphicon-envelope"></em> Xabarlar</a></li>
            <li @if($title=='Sozlamalar') class="active"@endif  ><a href="{{route('admin.profile.index')}}"><em class="fa fa-gear"></em> Sozlamalar</a></li>


		</ul>
	</div><!--/.sidebar-->







