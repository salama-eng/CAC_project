@extends('front.layout.home')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('css/contact_us.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <title>Cars Auction</title>
    </head>

    <main class=".main-contact d-flex justify-content-center align-items-center mt-5 ">
        <div class="overlay "></div>
        <div class="text container text-center col-11 col-lg-6 ">
            <h1 class="  yellow mb-5 fw-bold ">تواصل معنا</h1>
            <p class="fs-3 fw-light ">نحن نعمل باستمرار لجعل تجربتكمن خلال الخدمات أسهل, سنقوم بالرد على رسائلكم خلال 24
                ساعة.</p>

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

@endsection
