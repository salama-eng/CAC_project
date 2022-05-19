@extends('front.layout.home')
@section('content')
    @if($route == 'errorsRedirect')
        <section class="container d-flex mt-4 vh-100 align-items-center text-center justify-content-center">
            <div class="d-flex flex-wrap mt-5 justify-content-center align-items-center text-center">
                <h6 class="col-10 mt-4">  لا يمكنك الوصول </h6>
                <img class=" image-fluid m-auto col-9 col-lg-4" src="assets/images/error.png"  height=""alt="">
                <a href="/" class="card-link active text-center mt-3 mb-2 col-12">   العودة الى الرئيسية  
                    <i class="fa fa-long-arrow-left p-2 pt-1"> </i>
                </a>
            </div> 
        </section>
    @elseif($route == 'errorsProfile')
        <section class="container d-flex mt-4 vh-100 align-items-center text-center justify-content-center">
            <div class="d-flex flex-wrap mt-4 justify-content-center align-items-center text-center">
                <h6 class="col-10 mt-4">  اوبس! حسابك غير مفعل </h6>
                <img class=" image-fluid m-auto col-9 col-lg-4" src="assets/images/error.png"  height=""alt="">
                <a href="https://mail.google.com/mail/" class="card-link active text-center mt-3 mb-2 col-12">   تفعيل حسابك  
                    <i class="fa fa-long-arrow-left p-2 pt-1"> </i>
                </a>
            </div> 
        </section>
    @elseif($route == 'active_auction')
        <section class="container d-flex mt-4 vh-100 align-items-center text-center justify-content-center">
            <div class="d-flex flex-wrap mt-4 justify-content-center align-items-center text-center">
                <h6 class="col-10 mt-4 fs-2">  اوبس! لا يوجد انترنت </h6>
                <img class=" image-fluid m-auto col-9 col-lg-4" src="assets/images/error.png"  height=""alt="">
                
            </div> 
        </section>
    @endif
@endsection