@extends('front.layout.home')
@section('content')
    <section class="">

        <div class="landscape  d-flex align-items-start  flex-wrap  mb-5 pb-5 ">



            <div
                class="landscape-text col-lg-6 col-12  d-flex flex-wrap justify-content-center 
                   m-1 p-1 m-lg-5 p-lg-5 ">

                <h1 style="font-size: 6vw;" class=" col-lg-12 yellow ">شركة كاك مزاد </h1>
                <h1 style="font-size: 2vw;" class="text-white  col-lg-12 col-8 mt-0 mt-lg-4 ">لجميع السيارات والشاحنات
                    المستعملة والجديدة تجعل من السهل على الاعضاء العثور والمزايدة على جميع السيارات </h1>


                <div style="font-size: 1.5vw;" class=" col-lg-12 col-10 mt-lg-5 mt-1 "><a href="" class="btn-yellow  "><i
                            class="fa fa-long-arrow-left p-2 pt-1"> </i> ابدا التصفح </a></div>

            </div>

            <div class="landscape-image col-8  ">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="/images/slider1.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="/images/slider2.jpg" class="d-block w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                            <img src="/images/slider3.jpg" class="d-block w-100" alt="...">

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>


        </div>



        <div class="offers d-flex flex-column align-items-center mt-5 pt-5">
            <h1 class="d-flex flex-wrap mt-lg-5 mt-0 pt-5 mb-5 yellow fs-3">العروض الحالية <i
                    class="fa fa-long-arrow-left p-2 pt-1"> </i></h1>
            <div class="d-flex flex-wrap  col-8 col-lg-9">

                <div class="card text-light m-auto" style="width: 18rem;">
                    <img src="{{ URL::asset('images/car3.png') }}" class="card-img-top" height="220" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>

                <div class="card text-light m-auto" style="width: 18rem;">
                    <img src="{{ URL::asset('images/car1.png') }}" class="card-img-top" height="220" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>

                <div class="card text-light m-auto" style="width: 18rem;">
                    <img src="{{ URL::asset('images/car2.png') }}" class="card-img-top" height="220" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5 col-7 col-lg-8 m-auto pt-5">
            <h1 class=" yellow mt-4 text-center m-5">البراندات</h1>
            <div class="brands d-flex justify-content-around flex-wrap">


                <img class="img-fluid" src="brand/1.png" width="100"  height=""alt="">
                <img class="img-fluid"  src="brand/3.png" width="100" height=""alt="">
                <img  class="img-fluid" src="brand/4.png" width="100"  height=""alt="">
                <img class="img-fluid" src="brand/5.png" width="100" height=""alt="">
               


            </div>
        </div>
      </div>


        <div class="about mt-5 mb-5 d-flex flex-wrap">
          <div class="d-flex col-lg-6 col-10">

            <div >
              <img class="img-fluid" src="assets/car1.png" alt="">
            </div>

            <h3>مزادات كاك</h3>
       <a class="text-warning fs-8" href="">تعرف اكثر <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
          </div>

          <div class="col-lg-6 col-12">

          </div>

        </div>


    </section>
@endsection
