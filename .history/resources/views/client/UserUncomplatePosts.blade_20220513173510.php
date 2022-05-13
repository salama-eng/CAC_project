@extends('client.layout.clientdashboard')
@section('content')



<h3 class="text-warning  mt-5 mb-5 text-center">  عمليات البيع الغير مكتملة </h3>

<section class="card-container  d-flex flex-wrap justify-content-between ">
 {{-- c --}}
    @php
    $i=0;
@endphp
 
   
@foreach($posts as $post )
@foreach($post->auctions as $auction)
@if($post->is_active == 1 && $post->status_auction == 0 && $auction->admin_confirm == 1 && $post->end_date <= date('Y-m-d'))
@php
    $i++;
@endphp


<div class="card text-light m-auto my-4" style="width: 18rem;">
    <img src="{{ URL::asset('images/'.$post->image) }}" class="card-img-top p-3" height="220" alt="{{$post->image}}">
    <div class="card-body py-0">
        <h5 class="card-title text-center">{{$post->name}}</h5>
        <p class="text-center fs-7 card-details"> تنتهي في  <em> {{$post->end_date}} </em></p>
    </div>

    <div class="card-body d-flex justify-content-between py-0">
        <p href="#" class="card-link card-details fs-7">سعر المزايدة/<span class="active">{{$post->auctions->max('bid_total');}} $</span>
        </p>
        <a href="{{route('auctiondetails',$post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
    <div class="card-body d-flex justify-content-between py-0">
                    
        <a href="{{route('chat',$auction->id)}}" class="card-link active bg-darkgrey p-1 card-btn px-2 m-1 text-center w-75 m-auto my-2 fs-7"> الذهاب للدردشة  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
  
      
         </div>@if($auction->user_confirm==0)

         <div class="d-flex "><p class="card-link card-details fs-7  p-1 px-2 m-1 bg-red card-btn w-50 text-white">لم يتم الاستلام </p>
            @else
         <div class="d-flex"><p class="card-link card-details  fs-7 bg-yellow p-1 bg-green px-2 m-1 card-btn w-50 text-white"> تم الاستلام </p>

         @endif
         
         @if ($auction->payment_confirm==0)
         <p class="card-link card-details fs-7 bg-green p-1 px-3 m-1 card-btn w-75 text-white">لم يتم ارسال المبلغ  </p>
         @endif
       
        </div>
</div>

</div> 

@endif


@endforeach  
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