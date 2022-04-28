@extends('front.layout.home')
@section('content')

<main class=" main-contact1 d-flex justify-content-center align-items-center mt-5 ">
    <div class="overlay"></div>
    <div class="text container aboutheader text-center">
        <h1 class="mt-5   mb-5  yellow fw-bold ">  تواصل معنا </h1>
        <p class="  mb-5">شركة مزاد تأسست في 1982 بواسطة ويليس ج. جونسون، وبدأت كساحة واحدة في كاليفورنيا. 
            الآن يقع المقر الرئيسي في دالاس، تكساس، تعد كوبارت الشركة الرائدة على مستوى العالم في مزادات السيارات على الإنترنت، ووجهة رئيسية لإعادة بيع وإعادة تسويق السيارات. تقنية كوبارت المبتكرة ومنصة المزادات على الإنترنت تربط بين البائعين و لمشترين حول العالم. كوبارت تقوم بتشغيل أكثر من 200 موقع 
            في 11 بلد، وأكثر من 150,000 سيارة للمزاد كل يوم.

        </p>
        <a href="{{route('contact_us')}}" class=" border1 text-center mb-2 px-3 py-2 mt-5"> تواصل معنا  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
</main>

    <section class="social text-center my-5">
        <h3 class="yellow">تواصل معنا عبر</h3>
        <div class="container my-5 d-flex  col-12 ">
            <div class="box  col-3   col-md-4">
                <i class="fa fa-location-arrow yellow my-4 fs-1  "></i>
                <h5 class="my-3">العنوان</h5>
                <span>العاصمة صنعاء</span>
            </div>

            <div class="box  col-6  col-md-4">
                <i class="fa fa-envelope yellow my-4 fs-1"></i>
                <h5 class="my-3">بريد الكتروني</h5>
                <span> cac.cars.auction@gmail.com</span>
            </div>
            <div class="box col-3   col-md-4">
                <i class="fa fa-mobile yellow my-4 fs-1"></i>
                <h5 class="my-3">تلفون</h5>
                <span> 777 777 777</span>
            </div>
        </div>
    </section>

    <section class="send_message  position-relative ">
        <div class="boxes d-flex container flex-wrap my-5 align-items-center">
            <div class="box col-12 col-md-7 order-2 order-md-1 col-lg-6">
                <h5 class="yellow my-3 p-3 fs-3 ">ارسال رسالة</h5>
                <form action="" class="d-flex flex-wrap m-2">
                    <div class="group col-11 col-md-6  ">
                        <input type="text" name="" placeholder="الاسم" id="" class=" my-1 col-11">
                        <input type="text" name="" id="" placeholder="عنوان البريد الالكتروني" class=" my-1 col-11">
                        <input type="text" name="" id="" placeholder="رقم التلفون" class=" my-1 col-11 ">

                    </div>
                    <div class="group col-11 col-md-6 ">
                        <textarea name="" id="" cols="30" rows="3" placeholder="نص الرسالة" class="col-11 my-3 my-md-1 "></textarea>
                        <button type="submit" name="" class="col-11">ارسال </button>
                    </div>
                </form>
            </div>
            <div
                class="box  position-relative col-12 d-flex justify-content-center col-md-5 col-lg-6 align-items-center order-1 order-md-2">

                <img src="{{ URL::asset('images/map.png') }}" class=" shadow col-11 z-1 " alt="">

            </div>

        </div>
        <div class="yellow_box d-none d-md-block top-0  bg-yellow z-8"></div>


    </section>
@endsection
