@extends('front.layout.home')
@section('content')
    <section>
        <div class="auctions-bg w-100 mt-5">
            <div class="auctions-bg-child">
                <div class="d-flex align-items-center flex-wrap">
                    <h1 class="fw-bold w-100 text-center">
                        مستكشف المركبات
                    </h1>
                    <p class="w-100 text-center text-light">
                        هل تبحث عن سيارات بحالة معينة؟
                        <br>
                        تبسيط البحث عن طريق تحديد فئة لتضييق تطاق نتائجك
                    </p>
                    <form action="" class="w-100 d-flex justify-content-center">
                        
                        <select name="model" id="m" class="text-center">
                          <option value="model">الموديل</option>
                          <option value="2000">2000</option>
                          <option value="2000">2000</option>
                          <option value="2000">2000</option>
                        </select>
                        <br><br>
                        <input type="submit" value="Submit">
                      </form>
                </div>
            </div>
        </div>
    </section>
    <section class="offers d-flex flex-column align-items-center pt-5 ">
        <h1 class="d-flex flex-wrap   yellow fs-3">المزادات الحالية </h1>

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

    </section>
@endsection
