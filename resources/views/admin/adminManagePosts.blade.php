@extends('admin.layout.dashboard')
@section('content')


<h3 class="text-warning  mt-5 mb-5 text-center">عروض السيارات المعلقة </h3>

<section class="card-container  d-flex flex-wrap justify-content-between ">
  <div class="card text-light m-auto" style="width: 18rem;">
    <img src="{{ URL::asset('images/car4.jpg') }}" class="card-img-top" height="220" alt="...">
    <div class="card-body  mt-4">
        <h5 class="card-title text-center">Mercedes-Benz</h5>
        <p class="text-center fs-7 card-details"> تنتهي في  <em> 20.58.55 </em></p>
    </div>
    <div class="card-body d-flex justify-content-between  p-0 ">
        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span></p>
        <a href="#" class="card-link active">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
    <a href="" class="btn btn-sm bg-yellow">
         عرض الطلب في الرئيسية 
    </a>
</div>

  <div class="card text-light m-auto" style="width: 18rem;">
    <img src="{{ URL::asset('images/car4.jpg') }}" class="card-img-top" height="220" alt="...">
    <div class="card-body  mt-4">
        <h5 class="card-title text-center">Mercedes-Benz</h5>
        <p class="text-center fs-7 card-details"> تنتهي في  <em> 20.58.55 </em></p>
    </div>
    <div class="card-body d-flex justify-content-between  p-0 ">
        <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span></p>
        <a href="#" class="card-link active">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
    <a href="" class="btn btn-sm bg-yellow">
         عرض الطلب في الرئيسية 
    </a>
</div>

<div class="card text-light m-auto" style="width: 18rem;">
  <img src="{{ URL::asset('images/car4.jpg') }}" class="card-img-top" height="220" alt="...">
  <div class="card-body  mt-4">
      <h5 class="card-title text-center">Mercedes-Benz</h5>
      <p class="text-center fs-7 card-details"> تنتهي في  <em> 20.58.55 </em></p>
  </div>
  <div class="card-body d-flex justify-content-between  p-0 ">
      <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span></p>
      <a href="#" class="card-link active">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
  </div>
  <a href="" class="btn btn-sm bg-yellow">
         عرض الطلب في الرئيسية 
    </a>
</div>



</section>

@endsection