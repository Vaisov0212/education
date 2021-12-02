<?php $title="Bog`lanish"; ?>
  @include('layouts/header')

 <section class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_2.jpg');">
<div class="overlay"></div>
<div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Bog'lanish</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Bosh Sahifa <i class="ion-ios-arrow-forward"></i></a></span> <span>>Bog'lanish <i class="ion-ios-arrow-forward"></i></span></p>
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
                <h3 class="mb-4">Manzil:</h3>
              <p>Al-Xorazimiy ko'chasi 10-uy, Urgench Kharezm Uzbekistan</p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">bog'lanish uchun:</h3>
              <p><a >+ 998 91 421 71 30</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">Elektron manzil:</h3>
              <p><a href="mailto:info@yoursite.com">infostar@bk.ru</a></p>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
                <h3 class="mb-4">Web Sayt</h3>
              <p><a href="#">star.epizy.com</a></p>
            </div>
        </div>
      </div>
    </div>
  </section>

      <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
          <div class="container">
            <div id="ot"></div>
              <div class="row d-flex align-items-stretch no-gutters">
                  <div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
                      <form id="form1"  method="POST" action="{{route('contact')}}" enctype="multipart/form-data" >
                        @csrf
            <div class="form-group">
              <input id="name" type="text" class="form-control" name="name" placeholder="Ism, Familya" required >
            </div>
            <div class="form-group">
              <input id="email" type="text" class="form-control" name="email" placeholder="Email" required >
            </div>
            <div class="form-group">
              <input id="subject" type="text" class="form-control" name="subject" placeholder="Mavzu" required >
            </div>
            <div class="form-group">
              <textarea  id="message" cols="30" rows="7" name="message" class="form-control" placeholder="Xabar matni" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" id="btn" class="btn btn-warning py-3 px-5" > Yuborish </button>
            </div>
          </form>
        </div>
        <div class="col-md-6 d-flex align-items-stretch">
            <div id="map"></div>
        </div>
    </div>
</div>
</section>



  @include('layouts/footer')
