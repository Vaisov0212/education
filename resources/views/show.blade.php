<?php $title="Yangiliklar"?>

@include('layouts.header')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('../../images/04.jpeg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Yangiliklar</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="{{route('home')}}"><i class="ion-ios-arrow-forward">Bosh Sahifa</i></a></span> <span class="mr-2"><a href="{{route('news')}}">Yangiliklar<i class="ion-ios-arrow-forward"></i></a></span> <span> <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <p>
              <img src="/storage/app/public/posts/{{$post->img}}" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3">{{$post->subject}}</h2>
            <p>{{$post->text}}</p>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="qidiruv...">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3>Kurslar</h3>
              <ul class="categories">
                  @foreach ($course as $item)
                  <li><a href="">{{$item->course_name}} <span></span></a></li>
                  @endforeach
              </ul>
            </div>
            <div>
            <div class="sidebar-box ftco-animate">
              <h3>Ko'p o'qilgan yangiliklar</h3>
              @foreach ($fours as $item )

              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url('/storage/app/public/posts/{{$item->img}}');"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{route('news')}}">{{substr("$item->subject",0,60)}}...</a></h3>
                  <div class="meta">
                    <div><a ><span class="icon-calendar"></span>{{$item->created_at->format('Y m d')}}</a></div>
                    <div><a ><span class="icon-person"></span>{{$item->name}}</a></div>
                    <div><a ><span class="icon-eye"></span> 19</a></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Turkum</h3>
              <ul class="tagcloud m-0 p-0">
                <a href="" class="tag-cloud-link">School</a>
                <a href="" class="tag-cloud-link">Kids</a>
                <a href="" class="tag-cloud-link">Nursery</a>
                <a href="" class="tag-cloud-link">Daycare</a>
                <a href="" class="tag-cloud-link">Care</a>
                <a href="" class="tag-cloud-link">Kindergarten</a>
                <a href="" class="tag-cloud-link">Teacher</a>
              </ul>
            </div>




            <div class="sidebar-box ftco-animate">
              <h3>«STAR learning centr»</h3>
              <p>bu yangi, zamonaviy va yuqori darajadagi o`quv markazi.
                Biz ilim o'rganmoqchi bo'lgan yoshlarga yaqindan yordam beramiz
                Bizda yuqori ma’lakali, ko’p yillik tajribaga ega bo’lgan o’qituvchilar faoliyat olib borishadi. Bundan tashqari o’quv jarayoni zamonaviy o’quv metodikasiga ham egadir.
                            Bizning o`quv markazimiz natijaviylikka katta e’tibor qaratadi. O’quv markazimiz tomonidan ishlab chiqilgan test sinovlari, malakali o'qituvchilarimiz tamonidan shakillantrilgan.

              </p>
            </div>
          </div><!-- END COL -->
        </div>
			</div>
		</section>

        @include('layouts.footer')
