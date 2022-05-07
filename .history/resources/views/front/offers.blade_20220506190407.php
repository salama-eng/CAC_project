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

@foreach ($Posts as $post )
@if (!isset($post->auctions[0]->is_active))
        
@if($post->is_active == 1 && $post->status_auction == 0 && $post->end_date >= date('Y-m-d')))


  <div class="card text-light m-auto  py-0 mb-4 mt-4" style="width: 18rem;">
        <a href="{{route('auctiondetails',$post->id)}}"><img src="/images/{{$post->image}}" class="card-img-top p-3" height="220" alt="...">  </a>
        <div class="card-body py-0">
            <h5 class="card-title text-center"><span class="cate">{{$post->name}}</span>/<span class="mod">{{$post->model}}</span></h5>
            <p class="text-center fs-7 card-details type">جديد</p>
        </div>
        <div class="card-body d-flex justify-content-between py-0">
            <p href="#" class="card-link card-details">سعر المزايدة/<span class="active price">{{$post->starting_price}}</span><i class="active">$</i>
            </p>
            <a href="#" class='card-link active ' data-bs-toggle="modal" data-bs-target="#auction{{$post->id}}">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
        </div>
    </div>


   <!--  the model   -->

   <div class="modal fade user" id="auction{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content  ">
            <form action="" method="post">
                @csrf
                <div class="modal-header bg-darkgrey">
            
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-darkgrey ">
                   @php
                       $total=$post->starting_price + $post->auction_ceiling;
                   @endphp
                    <h2 class="text-white fs-4 p-3"> هل انت متاكد تريد المزايدة على السيارة بمبلغ <em class="yellow">{{$total}}$</em></h2>
                </div>
                <div class="modal-footer bg-darkergrey">
                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                    <input type="submit" class="btn bg-yellow text-white fs-5" value=" تاكيد  " />
                </div>
            </form>
        </div>
    </div>
</div>


    @endif
    @endif
@endforeach

      

         
           
            

       
          
           
            
        </div>

    </section>

@endsection