@extends('client.layout.clientdashboard')
@section('content')



<section class="card-container  d-flex flex-wrap justify-content-between ">

@php
    $i=0;
@endphp


@if ($i >= 0)
<div class="d-flex flex-wrap  justify-content-center align-items-center text-center">


    <h1 class="text-warning col-12 my-5">  عذرا لايوجد مزادات حالية</h1>
    <h6 class="col-10 ">  قد تكون المزادات منتهية التاريخ او غير مفعلة </h6>
    
    <img class=" image-fluid m-auto col-9 col-lg-4  my-3" src="assets/images/nodata.png"  height=""alt="">
    <a href="{{route('addAuction')}}" class="card-link active text-center mt-5 mb-2 col-12">   اضافة مزاد  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    
    
    </div> 

    @else


    
@foreach($users->posts as $post)

@if($post->is_active == 1 && $post->end_date >= date('Y-m-d'))
@php
    $i++;
@endphp
    <div class="card text-light m-auto" style="width: 18rem;">
        <img src="/images/{{$post->image}}" class="card-img-top" height="220" alt="{{$post->image}}">
        <div class="card-body  mt-4">
         
            <h5 class="card-title text-center">{{$post->name}}</h5>
            <p class="text-center fs-7 card-details"> تنتهي في  <em> {{$post->end_date}} </em></p>
        </div>
        <div class="card-body d-flex justify-content-between  p-0 ">
            {{-- <p href="#" class="card-link card-details">سعر المزايدة/<span class="active"> @foreach($users->auctions as $post)
                {{$post->bid_total}}
                @endforeach$</span></p> --}}

                <p href="#" class="card-link card-details">سعر المزايدة/<span class="active"> 
                    {{$post->starting_price}}
                 $</span></p>
            <a href="#" class="card-link active">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
        </div>
    </div>
@endif
@endforeach




@endif



</section>

@endsection