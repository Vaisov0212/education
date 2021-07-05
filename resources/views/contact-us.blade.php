<?php $title="Bog`lanish"; ?>
  @include('layouts/header')

 <section class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_2.jpg');">
<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Contact Us</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
    </div>
    </div>
</div>
</section>
<br>
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
<section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">Address</h3>
              <p>198 West 21th Street, Suite 721 New York NY 10016</p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">Contact Number</h3>
              <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">Email Address</h3>
              <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">Website</h3>
              <p><a href="#">yoursite.com</a></p>
            </div>
        </div>
      </div>
    </div>
  </section>

      <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
          <div class="container">
              <div class="row d-flex align-items-stretch no-gutters">
                  <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                      <form action="{{route('contact')}}" method="POST" enctype="multipart/form-data" >
                        @csrf
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Ism, Familya" required >
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="Email" required >
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" placeholder="Mavzu" required >
            </div>
            <div class="form-group">
              <textarea  id="message" cols="30" rows="7" name="message" class="form-control" placeholder="Xabar matni" required></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-warning py-3 px-5" > Yuborish </button>
            </div>
          </form>
                  </div>
                  <div class="col-md-6 d-flex align-items-stretch">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=uzbekistan,urgench,amina&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://soap2day-to.com">soap2day</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">embedgooglemap.net</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div>
                  </div>
              </div>
          </div>
      </section>


  @include('layouts/footer')
