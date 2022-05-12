@extends('client.layout.clientdashboard')
@section('content')
<section class="col-11 m-auto">
<div class="dash-header col-lg-12  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">

  <div class="dash-header1 col-8">
      <h5 class=" p-3"><span class="yellow f-size">  اسم المستخدم  : </span> {{ Auth::user()->name }} </h5>
      <h6 class=" p-3 active"><span class="text-white f-size"> اجمالي المبلغ في المحفضة  : </span>  {{ Auth::user()->id }} </h6>
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
<div class=" d-flex justify-content-between">
<button class="bg-yellow text-white py-2 px-3 m-2 ">  رقم المحفضة : 54  </button>
<button class="bg-yellow text-white py-2 px-3 m-2 ">طلب المبلغ</button>
</div>

<div class="dash-content d-flex flex-wrap justify-content-around m-auto" >


      
          <div class="card-wallet text-light p-3">
              <div class="d-flex justify-content-between align-items-center">
                 
              <div>
                <p class="fs-5 p-dash "> من  رقم حساب  (55895588) <span class="active"> المستخدم</span> خليفة القاضي</p>
                <p class="fs-6 p-dash grey ">@php
                 echo now();
                @endphp</p>
            </div>
                <p>1000 $</p> 
             
      
      </div></div>
 
  </div>
</div> 
</div>
</section>

@endsection