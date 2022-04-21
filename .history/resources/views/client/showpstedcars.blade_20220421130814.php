@extends('client.layout.clientdashboard')
@section('content')


<h3 class="text-warning m-auto mt-5 mb-5">السيارات المضافة في المزاد</h3>

<section class="container d-flex flex-wrap justify-content-between ">
  <div class="card text-light m-auto" style="width: 18rem;">
      <img src="{{ URL::asset('images/car1.png') }}" height="220" class="card-img-top" alt="...">
      <div class="card-body">
          <h5 class="card-title text-center">Mercedes-Benz</h5>
          <p class="text-center fs-7 card-details">جديد</p>

      
      </div>
   
      <div class="card-body d-flex justify-content-between">
          <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span></p>
          <a href="/makeAuction" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
      </div>
  </div>
  <div class="card text-light m-auto" style="width: 18rem;">
      <img src="{{ URL::asset('images/car4.jpg') }}" class="card-img-top" height="220" alt="...">
      <div class="card-body">
          <h5 class="card-title text-center">Mercedes-Benz</h5>
          <p class="text-center fs-7 card-details">جديد</p>

      </div>
      <div class="card-body d-flex justify-content-between">
          <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span></p>
          <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
      </div>
  </div>
  <div class="card text-light m-auto" style="width: 18rem;">
      <img src="{{ URL::asset('images/car5.jpg') }}" class="card-img-top" height="220" alt="...">
      <div class="card-body">
          <h5 class="card-title text-center">Mercedes-Benz</h5>
          <p class="text-center fs-7 card-details">جديد</p>
          
      </div>
   
      <div class="card-body d-flex justify-content-between">
          <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">3000$</span></p>
          <a href="#" class="card-link active">مزايدة<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
      </div>
  </div>
</section>

@endsection