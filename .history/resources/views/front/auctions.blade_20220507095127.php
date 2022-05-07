@extends('front.layout.home')
@section('content')
    <section>
        <div class="auctions-bg w-100 mt-5">

            <div class="d-flex  flex-wrap  auctions-bg-child ">
                <div></div>
                <h1 class="fw-bold w-100 text-center active mb-2">
                    مستكشف المركبات
                </h1>
                <p class="w-100 text-center text-lighter m-2 mb-5">
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

        <div class="d-flex flex-wrap  col-8 col-lg-9">


            @foreach($auctions as $auction )

@if($auction->auction_post->is_active == 1 && $auction->auction_post->end_date >= date('Y-m-d'))



            <div class="card text-light m-auto  py-0 mb-3" style="width: 18rem;">
             <a href="{{route('auctiondetails',$auction->auction_post->id)}}"> <img src="/images/{{$auction->auction_post->image}}" class="card-img-top p-3" height="220" alt="..."></a>
                <div class="card-body py-0">
                    <h5 class="card-title text-center"><span class="cate"></span>{{$auction->auction_post->name}} / <span class="mod">{{$auction->auction_post->model}}</span></h5>
                    <p class="text-center fs-7 card-details type">جديد</p>

                </div>
                <div class="card-body d-flex justify-content-between py-0">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">{{$auction->bid_total}}</span><i class="active">$</i>
                    </p>
                    <a href="#" class='card-link active ' data-bs-toggle="modal" data-bs-target="#auction{{$auction->auction_post->id}}">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                   
                </div>
            </div>


            <!--  the model   -->

            <div class="modal fade user" id="auction{{$auction->auction_post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                @if (Auth::id())
                
                <div class="modal-dialog">
                    <div class="modal-content ">
                        <form action="{{ route('bid_auction',$auction->auction_post->id) }}" method="post">
                            @csrf
                            <div class="modal-header bg-darkgrey">
                        
                                <button type="button" class="btn-close yellow" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body bg-darkgrey  p-3  ">
                              
                                <h2 class="text-white fs-6 pb-3 "> هل انت متاكد تريد المزايدة على هذة السيارة ودفع مبلغ مضاف الى قيمتها الحالية التي تقدر ب   <em class="yellow"> {{$auction->bid_total }}$</em></h2>
                                <div class="d-flex  align-items-center gap-3 ">
                                <h3 class="text-white fs-6"> مقدار الزيادة: </h3>
                                <input type="number" class="input-model text-white" min="{{$auction->auction_post->auction_ceiling}}" step="{{$auction->auction_post->auction_ceiling}}" value="{{$auction->auction_post->auction_ceiling}}"  name="amount">
                            </div>
                            @php
                                $discount=0.20*$auction->auction_post->starting_price;
                            @endphp
                            <h3 class="yellow fs-7 mt-2">*يجب ان تكون مقدار الزيادة من مضاعفات {{$auction->auction_post->auction_ceiling }}$</h3>
                            <h3 class="yellow fs-7 mt-2">{{ $discount}}$</h3>
                            </div>

                            <div class="modal-footer bg-darkergrey">
                                <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                <input type="submit" class="btn bg-yellow text-white fs-5" value=" تاكيد  " />
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="modal-dialog">

               
                    
                    
                    <div class="modal-content m-auto ">
                        <div class="modal-header bg-darkgrey">
                        
                            <button type="button" class="btn-close yellow" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                       <h6 class="text-center yellow mt-5 mb-5 ">عذرا يرجى تسجيل الدخول اولا حتى تتمكن من المزايدة!!</h6>
                        <img class="m-auto" src="/assets/images/login_error.png" width="300" alt="">
                        <a href="{{route('login')}}" class="card-link active text-center mt-5 mb-5"> تسجيل الدخول <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                    </div>
                </div>

                @endif
            </div>

@endif
@endforeach


   
          
        </div>

    </section>
@endsection
