@extends('admin.layout.dashboard')
@section('content')
    <section>
        <div class="dash-header col-lg-11  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">


            <div class="dash-header1 col-8">
                <h4 class=" p-3"><em class="text-warning">مرحبا!!</em> {{ Auth::user()->name }} </h4>
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

        <div class="dash-content d-flex flex-wrap">
            <div>
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
            </div>
        </div>


    </section>
@endsection
