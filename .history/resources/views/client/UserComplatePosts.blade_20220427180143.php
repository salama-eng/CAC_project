
@extends('client.layout.clientdashboard')
@section('content')



<h3 class="text-warning  mt-5 mb-5 text-center">عمليات البيع المكتملة  </h3>


<section class="card-container  d-flex flex-wrap justify-content-between ">
    @php
    $i=0;
@endphp
@foreach($orders as $order)
        @if($order->post->is_active == 1 && $order->post->status_auction == 1)

        <div class="card text-light m-auto my-4" style="width: 18rem;">
            <img src="/images/{{$auction->auction_post->image}}" class="card-img-top p-3" height="220" alt="{{$auction->auction_post->image}}">
        <h5 class="card-title text-center"></h5>
         
        
        @php
    $i++;
@endphp


<div class="card text-light m-auto my-4" style="width: 18rem;">
    <img src="/images/{{$auction->auction_post->image}}" class="card-img-top p-3" height="220" alt="{{$auction->auction_post->image}}">
<h5 class="card-title text-center">{{$auction->auction_post->name}}</h5>
 

    <div class="card-body d-flex justify-content-between py-0">
        <p href="#" class="card-link card-details fs-7">سعر المزايدة/<span class="active"> {{$auction->bid_total}}$</span>
        </p>
        <a href="{{route('auctiondetails',$auction->auction_post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>

    <div class="card-body d-flex justify-content-between py-0">
        
        <a href="{{route('auctiondetails',$auction->auction_post->id)}}" class="card-link active bg-darkgrey p-1 card-btn px-3 m-1 text-white  fs-7"> الدردشة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
  
        <a href="#" class="card-link card-details fs-7 bg-yellow p-1 px-3 m-1 card-btn text-white">تاكيد الاستلام </a>
         </div>
  
</div>


            
<div class="card text-light m-auto my-4" style="width: 18rem;">
    <img src="/images//{{$post->image}}" class="card-img-top p-3" height="220" alt="...">
    <div class="card-body py-0">
        <h5 class="card-title text-center">{{$post->name}}</h5>
        <p class="text-center fs-7 card-details"> تنتهي في  <em> {{$post->end_date}} </em></p>
    </div>

    <div class="card-body d-flex justify-content-between py-0">
        <p href="#" class="card-link card-details fs-7">سعر المزايدة/<span class="active"> {{$post->starting_price}}$</span>
        </p>
        <a href="{{route('auctiondetails',$post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
</div>
      
        @endif
    @endforeach

    @if ($i <= 0)
    <div class="d-flex flex-wrap col-12 justify-content-center align-items-center text-center">
    
        <h6 class="col-12 "> عذرا لايوجد بيانات؟؟ </h6>
        
        <img class=" image-fluid m-auto col-8 col-lg-3  my-3" src="assets/images/nodata.png"  height=""alt="">
        <a href="{{route('addAuction')}}" class="card-link active text-center mt-5 mb-2 col-12">   اضافة مزاد  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
        
        
        </div> 
    @endif


</section>
@endsection