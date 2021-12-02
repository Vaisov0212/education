<?php $title="Yangiliklar"; ?>
@include('layouts/header')

<section class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_2.jpg');">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Yangiliklar</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}">Bosh sahifa <i class="ion-ios-arrow-forward"></i></a></span> <span>Yangiliklar <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

      <section class="ftco-section bg-light">
          <div class="container">
              <div class="row">

                @foreach ($posts as $item )

        <div class="col-md-6 col-lg-4 ftco-animate">
          <div class="blog-entry">
            <a   class="block-20 d-flex align-items-end" style="background-image: url('/storage/app/public/posts/{{$item->img}}');">
                              <div class="meta-date text-center p-2">
                <span class="day">{{$item->created_at->format('d')}}</span>
                <span class="mos">{{$item->created_at->format('M')}}</span>
                <span class="yr">{{$item->created_at->format('Y')}}</span>
              </div>
            </a>
            <div class="text bg-white p-4">
              <h3 class="heading"><a >{{substr("$item->subject",0,31)}}...</a></h3>

              <p>{{substr("$item->text",0,122)}}...</p>
              <div class="d-flex align-items-center mt-4">
                  <p class="mb-0"><a href="{{route('show_blog',$item->id)}}" class="btn btn-success">Batafsil <span class="ion-ios-arrow-round-forward"></span></a></p>
                  <p class="ml-auto mb-0">
                      <a  class="mr-2 ">{{$item->name}}</a>
                      <a  class="meta-chat"><span class="icon-eye"></span> {{$item->views}}</a>
                  </p>
              </div>
            </div>
          </div>
        </div>

      @endforeach
      <div class="row no-gutters my-5">
        <div class="col text-center">
          <div class="block-27">
            {{$links}}
          </div>
        </div>
      </div>
          </div>
      </section>

      @include('layouts/footer')
