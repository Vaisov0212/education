<?php $title="Yangiliklar"?>

@include('layouts.header')

    <section class="hero-wrap hero-wrap-2" style="background-image: url('/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Yangiliklar</h1>
             <p class="breadcrumbs"><span class="mr-2"><a href="index.html"><i class="ion-ios-arrow-forward">Bosh Sahifa</i></a></span> <span class="mr-2"><a href="index.html">Yangiliklar<i class="ion-ios-arrow-forward"></i></a></span> <span> <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section">
			<div class="container">
				<div class="row">
          <div class="col-lg-8 ftco-animate">
            <p>
              <img src="/storage/posts/{{$post->img}}" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3">{{$post->subject}}</h2>
            <p>{{$post->text}}</p>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-4 sidebar ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon icon-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
            	<h3>Turkumlar</h3>
              <ul class="categories">
                <li><a href="#">Matematika <span></span></a></li>
                <li><a href="#">Rus tili <span></span></a></li>
                <li><a href="#">Ingiliz tili <span></span></a></li>
                <li><a href="#">Arab tili <span></span></a></li>
                <li><a href="#">IELTS<span></span></a></li>
                <li><a href="#"><span></span></a></li>
              </ul>
            </div>
            <div>
            <div class="sidebar-box ftco-animate">
              <h3>Popular Articles</h3>
              @foreach ($fours as $item )

              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Jan. 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Dave Lewis</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Tag Cloud</h3>
              <ul class="tagcloud m-0 p-0">
                <a href="#" class="tag-cloud-link">School</a>
                <a href="#" class="tag-cloud-link">Kids</a>
                <a href="#" class="tag-cloud-link">Nursery</a>
                <a href="#" class="tag-cloud-link">Daycare</a>
                <a href="#" class="tag-cloud-link">Care</a>
                <a href="#" class="tag-cloud-link">Kindergarten</a>
                <a href="#" class="tag-cloud-link">Teacher</a>
              </ul>
            </div>

            <div class="sidebar-box ftco-animate">
            	<h3>Archives</h3>
              <ul class="categories">
              	<li><a href="#">December 2018 <span>(30)</span></a></li>
              	<li><a href="#">Novemmber 2018 <span>(20)</span></a></li>
                <li><a href="#">September 2018 <span>(6)</span></a></li>
                <li><a href="#">August 2018 <span>(8)</span></a></li>
              </ul>
            </div>


            <div class="sidebar-box ftco-animate">
              <h3>Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
          </div><!-- END COL -->
        </div>
			</div>
		</section>

        @include('layouts.footer')
