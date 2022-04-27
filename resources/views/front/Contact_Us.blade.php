@extends('front.layout.home')
@section('content')

<link rel="stylesheet" href="{{ URL::asset('css/contact_us.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <title>Cars Auction</title>
</head>

<main class="d-flex justify-content-center align-items-center  ">
    <div class="overlay "></div>
    <div class="text container text-center col-11 col-lg-6 ">
        <h1 class="  yellow mb-5 fw-bold">تواصل معنا</h1>
        <p class="fs-3 ">نحن نعمل باستمرار لجعل تجربتكمن خلال الخدمات أسهل, سنقوم بالرد على رسائلكم خلال 24 ساعة.</p>

    </div>
</main>

<section class="social text-center my-5">
    <h3 class="yellow">تواصل معنا عبر</h3>
    <div class="container my-5 d-flex justify-content-around ">
        <div class="box border-left">
            <i class="fa fa-location-arrow yellow my-4 fs-1  "></i>
            <h5 class="my-3">العنوان</h5>
            <span>العاصمة صنعاء</span>
        </div>

        <div class="box bd-highlight"> 
        <i class="fa fa-envelope yellow my-4 fs-1"></i>
            <h5 class="my-3">بريد الكتروني</h5>
            <span > cac.cars.auction@gmail.com</span>
        </div>
        <div class="box">
            <i class="fa fa-mobile yellow my-4 fs-1"></i>
            <h5 class="my-3">تلفون</h5>
            <span > 777 777 777</span>
        </div>
    </div>
</section>

<section class="send_message  position-relative ">
    <div class="boxes d-flex container  my-5 align-items-center">
    <div class="box col-6 ">
        <h5 class="yellow my-4">ارسال رسالة</h5>
        <form action="" class="d-flex flex-wrap">
            <div class="group col-md-6 p-2 ">
                <input type="text" name="" placeholder="الاسم" id="" class=" my-1 col-11">
                <input type="text" name="" id="" placeholder="عنوان البريد الالكتروني" class=" my-1 col-11">
                <input type="text" name="" id="" placeholder="رقم التلفون" class=" my-1 col-11 ">

            </div>
            <div class="group col-md-6 ">
                <textarea name="" id="" cols="30" rows="3" placeholder="نص الرسالة" class="col-11 mt-3 mb-0"></textarea>
                <button type="submit"  name="" class="col-11">ارسال </button>
            </div>
        </form>
    </div>
    <div class="box  position-relative">
        
        <img src="{{ URL::asset('images/map.png') }}" class=" shadow w-100  posistion relative z-3" alt="">

    </div>

    </div>
        <div class="yellow_box  top-0  bg-yellow z-8"></div>
        

</section>

@endsection