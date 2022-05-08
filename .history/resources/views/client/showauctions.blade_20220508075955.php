@extends('client.layout.clientdashboard')
@section('content')


<h3 class="text-warning  mt-5 mb-5 text-center">السيارات التي تمت المزايدة عليها </h3>

<section class="card-container  d-flex flex-wrap justify-content-between text-center ">

@php
    $i=0;
@endphp
@foreach($posts->auctions as $auction)
@if ($post->auctions->aw_user_id == Auth::id())
    
@endif
@endforeach
@foreach($posts as $post )

@if($post->is_active == 1 && $post->end_date >= date('Y-m-d') )
@php
    $i++;
@endphp



<div class="card text-light m-auto my-4" style="width: 18rem;">
    <img src="{{ URL::asset('images/'.$auction->auction_post->image) }}" class="card-img-top p-3" height="220" alt="{{$auction->auction_post->image}}">
    <div class="card-body py-0">
        <h5 class="card-title text-center">{{$auction->auction_post->name}}</h5>
        <p class="text-center fs-7 card-details"> تنتهي في  <em> {{$auction->auction_post->end_date}} </em></p>
    </div>

    <div class="card-body d-flex justify-content-between py-0">
        <p href="#" class="card-link card-details fs-7">سعر المزايدة/<span class="active"> {{$auction->bid_total}}$</span>
        </p>
        <a href="{{route('auctiondetails',$auction->auction_post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
</div> 

  
@endif
@endforeach

@if ($i <= 0)
<div class="d-flex flex-wrap col-12 justify-content-center align-items-center text-center">

    <h6 class="col-10 ">  قد تكون المزادات منتهية التاريخ او غير مفعلة </h6>
    
    <img class=" image-fluid m-auto col-9 col-lg-4  my-3" src="assets/images/nodata.png"  height=""alt="">
    <a href="/" class="card-link active text-center mt-5 mb-2 col-12">  العودة للرئيسية  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    
    
    </div> 
@endif
</section>

@endsection