
@extends('client.layout.clientdashboard')
@section('content')



<h3 class="text-warning  mt-5 mb-5 text-center">عمليات الشراء المكتملة  </h3>


<section class="card-container  d-flex flex-wrap justify-content-between ">
    @php
    $i=0;
@endphp

@foreach ($orders as $order)
    

<div class="card text-light m-auto my-4" style="width: 18rem;">
    <img src="{{ URL::asset('images/'.$order->post->image) }}" class="card-img-top p-3" height="220" alt="{{$order->post->image}}">
<h5 class="card-title text-center">{{$order->post->name}}</h5>
 

    <div class="card-body d-flex justify-content-between py-0">
        <p href="#" class="card-link card-details fs-7">السعر /<span class="active"> {{$order->price}}$</span>
        </p>
        <a href="{{route('auctiondetails',$order->post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>

    <div class="card-body d-flex justify-content-between py-0">
        
       
       
         </div>
  
</div>

@php
$i++;
@endphp


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