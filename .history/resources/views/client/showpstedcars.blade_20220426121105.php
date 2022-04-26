@extends('client.layout.clientdashboard')
@section('content')


<h3 class="text-warning  mt-5 mb-5 text-center">السيارات المضافة في المزاد</h3>

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
@endif
</section>

@endsection