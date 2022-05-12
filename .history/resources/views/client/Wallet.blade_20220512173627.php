@extends('client.layout.clientdashboard')
@section('content')
    <section class="col-11 m-auto">
        <div class="dash-header3 col-lg-12  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">

            <div class="dash-header1 col-8">
                <h5 class=" p-3"><span class="yellow f-size"> اسم المستخدم : </span> {{ Auth::user()->name }}
                </h5>
                <h6 class=" p-3 active"><span class="text-white f-size"> رقم المحفضة : </span> 54{{ Auth::user()->id }}
                </h6>
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
            <button class="bg-yellow text-white py-2 px-3 m-2 p-dash fs-6">اجمالي المبلغ في المحفضة : 455</button>
            <button class="bg-yellow text-white py-2 px-3 m-2 p-dash  fs-6">طلب المبلغ</button>
        </div>

        <div class="dash-content d-flex flex-wrap justify-content-around m-auto">



            <div class="card-wallet text-light p-3">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="fs-6 p-dash "> من رقم حساب <span class="active">(5536)</span> المستخدم <span
                                class="active">خليفة القاضي</span></p>
                        <p class="fs-7 p-dash grey ">@php
                            echo now();
                        @endphp</p>
                    </div>
                    <p class="fs-3 green p-dash">+ 1000 $</p>


                </div>
            </div>
            <div class="card-wallet text-light p-3">
              <div class="d-flex justify-content-between align-items-center">

                  <div>
                      <p class="fs-6 p-dash "> الى رقم حساب <span class="active">(5536)</span> المستخدم <span
                              class="active">خليفة القاضي</span></p>
                      <p class="fs-7 p-dash grey ">@php
                          echo now();
                      @endphp</p>
                  </div>
                  <p class="fs-3 red p-dash">- 1000 $</p>


              </div>
          </div>

      
        
        </div>
    </section>
@endsection
