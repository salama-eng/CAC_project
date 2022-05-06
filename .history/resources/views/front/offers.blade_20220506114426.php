@extends('front.layout.home')
@section('content')
    <section>
        <div class="auctions-bg offers-bg w-100 mt-5">

            <div class="d-flex  flex-wrap  auctions-bg-child ">
                <div></div>
                <h1 class="fw-bold w-100 text-center active">
                    مستكشف المركبات
                </h1>
                <p class="w-100 text-center text-light">
                    هل تبحث عن سيارات بحالة معينة؟
                    <br>
                    تبسيط البحث عن طريق تحديد فئة لتضييق تطاق نتائجك
                </p>
                <form action="" class="w-100 d-flex flex-wrap auction-form">
                    <div class="w-75 d-flex justify-content-between flex-wrap mx-auto">

                        <div class="my-2 mx-auto">
                            <select  id="mod" class="text-center py-1">
                                
                                <option value="2000">2000</option>
                                <option value="2004">2004</option>
                                <option value="2010">2010</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select  id="cate" class="text-center  py-1">
                               
                                <option value="Toyota">Toyota</option>
                                <option value="Rafor">Rafor</option>
                                <option value="Prado">Prado</option>
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select  id="type" class="text-center  py-1">
                           
                                <option value="مستخدم">مستخدم</option>
                                <option value="جديد">جديد</option>
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select  id="price" class="text-center py-1 d-flex">
                                
                                <option value="price-low">اقل من 2000$</option>
                                <option value="price-mid">$2000 - $4000</option>
                                <option class="price-hight">$5000 - $7000</option>
                                <option value="price-x-hight">اكثر من 7000$</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-center">
                        <input type="submit" value="ابحث" class="py-1 px-5 my-3 contact text-light border-0">

                    </div>
                </form>

            </div>
        </div>
    </section>
    <section class="offers offers-page d-flex flex-column align-items-center pt-5 my-5 ">
        <h1 class="d-flex flex-wrap   yellow fs-3">المزادات الحالية </h1>


        <div class="d-flex flex-wrap  col-8 col-lg-9 gap-1">

            <div class="card text-light m-auto  py-0 mb-4 mt-4" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Toyota</span>/<span class="mod">2000</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">3000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>

            <div class="card text-light m-auto mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Rafor</span>/<span class="mod">2004</span></h5>
                    <p class="text-center fs-7 card-details type">مستخدم</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">8000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>

            <div class="card text-light m-auto mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Prado</span>/<span class="mod">2020</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">30000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>
            <div class="card text-light m-auto  py-0 mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Toyota</span>/<span class="mod">2000</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">3000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>

            <div class="card text-light m-auto mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Rafor</span>/<span class="mod">2004</span></h5>
                    <p class="text-center fs-7 card-details type">مستخدم</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">8000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>

            <div class="card text-light m-auto mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Prado</span>/<span class="mod">2020</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">30000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>
            <div class="card text-light m-auto  py-0 mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Toyota</span>/<span class="mod">2000</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">3000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>

            <div class="card text-light m-auto mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Rafor</span>/<span class="mod">2004</span></h5>
                    <p class="text-center fs-7 card-details type">مستخدم</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">8000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>

            <div class="card text-light m-auto mb-3" style="width: 18rem;">
                <img src="/images/1.png" class="card-img-top p-3" height="220" alt="...">
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate">Prado</span>/<span class="mod">2020</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">30000</span><i class="active">$</i>
                    </p>
                    <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>
          
        </div>

    </section>

@endsection