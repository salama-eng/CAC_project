@extends('front.layout.home')
@section('content')
    <section class="">

        <div class="landscape  d-flex align-items-start col-12 ">


            <div class=" pe-5 landscape-div mt-5 ">
                <div class="landscape-text d-flex flex-wrap  
                 p-5 me-5 w-50">

                    <h1 class="  text-white ">  شركة 
                         <h1 class="yellow"> كاك </h1>
                           <h1 class="text-white"> مزاد </h1>
                    <p class="text-light white mt-lg-4 fs-5 fw-light">
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
                        @php $i = 1 @endphp
                        @foreach($Slider as $slider)
                        @if($i == 1)
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$i - 1}}"
                            class="active" aria-current="true" aria-label="Slide.{{$i}}"></button>
                        @else
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$i - 1}}"
                            aria-label="Slide.{{$i}}"></button>
                        <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button> -->
                        @endif
                        <?php $i++ ?>
                        @endforeach
                    </div>
                    <div class="carousel-inner"  >
                        <?php $i = 1 ?>

                        @foreach($Slider as $slider)

                        @if($i == 1)

                        <div class="carousel-item active" data-bs-interval="{{$i * 1000}}">
                            <img src="{{ URL::asset('images/'.$slider->image) }}" alt="{{$slider->image}}" data-bs-interval="1000" class="img-fluid w-100 " alt="...">

                        </div>
                        @else
                          <div class="carousel-item" data-bs-interval="{{$i * 5000}}">
                            <img src="{{ URL::asset('images/'.$slider->image) }}" class="img-fluid w-100" alt="...">

                        </div> 
                        @endif
                        <?php $i++ ?>
                        @endforeach

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
                <a href="/offers" class="px-4 text-light fs-6 d-block text-lg-start text-center  py-2">المزيد<i
                        class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
            </div>
            <div class="d-flex flex-wrap  col-8 col-lg-9 current-offers">

            @foreach ($Posts as $post)
                <div class="card text-light m-auto  py-0 mb-3" style="width: 18rem;">
                    <img src="{{ URL::asset('images/'.$slider->image) }}" class="card-img-top p-3" height="220" alt="...">
                    <div class="card-body py-0">
                        <h5 class="card-title text-center">{{$post->name}}</h5>
                        <p class="text-center fs-7 card-details">
                            @if($post->status_car)  جديد
                             @else 
                             مستخدم
                             @endif
                        </p>

                    </div>
                    <div class="card-body d-flex justify-content-between py-0 w-100">
                        <p href="#" class="card-link card-details ms-0">سعر المزايدة/<span class="active">{{$post->starting_price}}$</span>
                        </p>
                        <a href="#" class="card-link active ms-0">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>
            @endforeach

                <!-- <div class="card text-light m-auto mb-3" style="width: 18rem;">
                    <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                    <div class="card-body py-0">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between py-0 w-100">
                        <p href="#" class="card-link card-details ms-0">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active ms-0">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>

                <div class="card text-light m-auto mb-3" style="width: 18rem;">
                    <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                    <div class="card-body py-0">
                        <h5 class="card-title text-center">Mercedes-Benz</h5>
                        <p class="text-center fs-7 card-details">جديد</p>

                    </div>
                    <div class="card-body d-flex justify-content-between py-0 w-100">
                        <p href="#" class="card-link card-details ms-0">سعر المزايدة/<span class="active">3000$</span>
                        </p>
                        <a href="#" class="card-link active ms-0">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div> -->
            </div>

        </div>

        <div class="mt-5 col-7 col-lg-8 m-auto py-5">
            <h1 class=" yellow mt-4 text-center m-5 active fs-3">البراندات</h1>
            <div class="brands d-flex justify-content-around flex-wrap">
                @foreach($members as $member)

                <img class="img-fluid" src="{{ URL::asset('images/'.$member->image) }}" width="100" height="" alt="">

                @endforeach
                <!-- <img class="img-fluid" src="brand/5.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/3.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/4.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/1.png" width="100" height="" alt="">
                <img class="img-fluid" src="brand/5.png" width="100" height="" alt=""> -->



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
