
@extends('front.layout.home')
@section('content')

    <section class="d-flex container col-10 bg-lightgrey mt-3 justify-content-center gap-5 flex-wrap">
        <section class="col-lg-5 col-sm-11 mt-5">
            <div id="carouselExampleControls" class="carousel slide col-12 mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL::asset('images/main.png') }}" class="d-block w-100 main-img" alt="...">
                    </div>


                </div>

                <div class="col-lg-12 col-sm-12 d-flex flex-wrap justify-content-between">
                    <div class="">
                        <img src="{{ URL::asset('images/1.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." style="border:1px solid #e3911e"
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/2.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/3.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/4.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/5.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/6.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/7.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/8.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/9.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/10.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                </div>

        </section>
        <section class="col-11  col-lg-5 mt-5">
            <div class="card mt-5 me-4">
                
                <ul class="list-group list-group-flush ">
                  <li class="list-group-item w-100 d-flex justify-content-between">
                      <p>اسم السياره</p>
                      <p>pmw</p>
                  </li>
                  <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>الصنف</p>
                    <p>تويوتا</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>موديل السياره</p>
                    <p>2006</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> نوع المحرك</p>
                    <p>أوتوماتك</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> تاريخ انتهاء المزاد</p>
                    <p>2022 - 5 -17</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>  سعر السيارة البدائي </p>
                    <p>$2000</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>  مقدار الزيادة كأدنى حد</p>
                    <p>$50</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>  لون السيارة</p>
                    <p>اسود</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> العنوان</p>
                    <p>حدة</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> نوع الضرر</p>
                    <p>سطحي</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>حالة السياره</p>
                    <p>مستخدم</p>
                </li>
                
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>الوصف</p>
                    <p>pmw</p>
                </li>
                </ul>
              
              </div>
        </section>

    </section>

    @endsection