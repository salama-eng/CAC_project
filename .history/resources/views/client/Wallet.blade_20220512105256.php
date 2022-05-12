@extends('client.layout.clientdashboard')
@section('content')

<div class="dash-header col-lg-12  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">

  <div class="dash-header1 col-8">
      <h4 class=" p-3"><em class="yellow">مرحبا!!</em> {{ Auth::user()->name }} </h4>
      <p> التقارير اليومية للموقع </p>
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
@endsection