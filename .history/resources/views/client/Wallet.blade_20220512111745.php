@extends('client.layout.clientdashboard')
@section('content')
<section class="col-11 m-auto">
<div class="dash-header col-lg-12  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">

  <div class="dash-header1 col-8">
      <h5 class=" p-3"><span class="yellow">  اسم المستخدم  : </span> {{ Auth::user()->name }} </h5>
      <h6 class=" p-3 active"><span class="text-white"> اجمالي المبلغ في المحفضة  : </span>  {{ Auth::user()->id }} </h6>
  </div>

  <div class="dash-header2 col-4">

      <p class="hour ">
          @php
              print_r(date('H:i:s'));
              
          @endphp

      </p>
      <p>
          @php
              print_r(date('Y-m-d'));
              
          @endphp
      </p>


  </div>
</div>
<button class="bg-yellow text-white py-2 px-3 m-2 ">  رقم المحفضة : 54  </button>
<button class="bg-yellow text-white py-2 px-3 m-2 text-start">طلب المبلغ</button>

<div class="dash-content d-flex flex-wrap justify-content-around m-auto" >


      
          <div class="card-wallet text-light p-3">
              <div class="d-flex justify-content-between align-items-center">
                  <i class="yellow fs-1 bi bi-people-fill"></i>
                  <em class="fs-3"></em>
              </div>
              <div>
                  <p class="fs-7 p-dash grey">اجمالي المبلغ في المحفضة</p>
              </div>
      
      </div>

       

  </div>


</div> 


</div>
</section>

@endsection