@extends('front.layout.home')
@section('content')
    <section class="">

        <div class="landscape  d-flex align-items-start col-12 ">


            <div class=" pe-5 landscape-div">
                <div class="landscape-text d-flex flex-wrap  
                 p-5 me-5 w-50">

                    <h1 class="  yellow fs-1">شركة كاك مزاد </h1>
                    <p class="text-light  mt-lg-4 fs-5 fw-light">
                        لجميع السيارات والشاحنات المستعملة والجديدة <br>تجعل من السهل على الاعضاء العثور والمزايدة على جميع
                        السيارات
                    </p>


                    <button class=" fs-6 mt-lg-4  d-flex align-items-center btn-yellow btn text-light rounded-0"><a href=""
                            class=" d-block text-light">
                            ابدا التصفح </a>
                        <i class="fa fa-long-arrow-left m-2"> </i>
                    </button>

                </div>
            </div>


            <div class="landscape-image col-12 col-xl-8">
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
                            <img src="/images/slider3.jpg" class="img-fluid w-100" alt="...">

                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="/images/slider3.jpg" class="img-fluid w-100" alt="...">

                        </div>
                        <div class="carousel-item">
                            <img src="/images/slider3.jpg" class="img-fluid w-100" alt="...">

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



        <div class="offers d-flex flex-column align-items-center pt-5 ">
            <h1 class="d-flex flex-wrap   yellow fs-3">العروض الحالية </h1>
            <div class="w-75 more">
                <a href="" style="text-align: left" class="px-4 text-light fs-6 d-block">المزيد<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
            </div>
            <div class="d-flex flex-wrap  col-8 col-lg-9">

                <div class="card text-light m-auto  py-0 mb-3" style="width: 18rem;">
                    <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                    <div class="card-body py-0">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between py-0">
                        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>

                <div class="card text-light m-auto mb-3" style="width: 18rem;">
                    <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                    <div class="card-body py-0">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between py-0">
                        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>

                <div class="card text-light m-auto mb-3" style="width: 18rem;">
                    <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                    <div class="card-body py-0">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between py-0">
                        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5 col-7 col-lg-8 m-auto py-5">
            <h1 class=" yellow mt-4 text-center m-5 active fs-3">البراندات</h1>
            <div class="brands d-flex justify-content-around flex-wrap">

                <img class="img-fluid" src="brand/5.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/3.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/4.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/1.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/5.png" width="100" height="" alt="">



            </div>
        </div>
        </div>


        <div class="about mt-5 mb-5 pt-3">
            <div class="d-flex  col-12 about1">

                <div class="col-12 col-lg-7 img-3-sec d-flex align-items-center justify-content-end">
                    <div class="">
                   
                    </div>
                         
                   
                    <a href="" class="text-light p-2 px-4 d-none">من نحن
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <p class="text-light ">تقنية المزاد على <span class="active"> كاك مزاد </span>المنصة المحركة لمزادات السيارات عبر الانترنت</p>
                </div>

            </div>

            <div class="d-flex col-12 about2">
                <div class=" d-flex align-items-center justify-content-end">
                    <p class="col-4 p-5 text-light m-auto section-text">مع تطور تكنلوجيا مزتد السيارات على الانترنت , كاك مزاد تمكنك من البيع المباشر لسيلرتك او شراء اي سيارة بكل راحة ومن تامنزل او المكتب . على اجهزة الكمبيوتر او الأجهزةالمحمولة , انت تعرف بالفعل كيف التسجيل , تقديم ترخيص التجارة و تسجيل في المزاد</p>
                    <div class="img-3-sec2 col-6"><img src=""></div>
                </div>
            </div>

        </div>





    </section>
@endsection
