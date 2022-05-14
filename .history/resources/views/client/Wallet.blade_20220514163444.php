@extends('client.layout.clientdashboard')
@section('content')
    <section class="col-11 m-auto">
        <div class="dash-header3 col-lg-12  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">

            <div class="dash-header1 col-8">
                <h5 class=" p-3"><span class="yellow f-size"> اسم المستخدم : </span> {{ $user->name }}
                </h5>@foreach ($wallet as $wallet)
                <h6 class=" p-3 active"><span class="text-white f-size"> رقم المحفضة : </span>{{$wallet->uuid}}
                @endforeach
               
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
        <div class=" d-flex justify-content-between mt-2">
            <button class="bg-yellow text-white py-2 px-3 m-2 p-dash fs-6">اجمالي المبلغ في المحفضة : {{$balance}}$</button>
            <button class="bg-yellow text-white py-2 px-3 m-2 p-dash  fs-6">طلب المبلغ</button>
        </div>

        <div class="dash-content d-flex flex-wrap justify-content-around m-auto">

 @foreach ($transaction as $transaction)
  @if ($transaction->type === 'deposit')
            <div class="card-wallet text-light p-3">
               
                 
                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="fs-6 p-dash ">تم ايداع مبلغ    <span class="active">({{$transaction->amount}})</span> من حساب مدير الموقع  <span
                            class="active"></span></p>
                    <p class="fs-7 p-dash grey ">@php
                        echo now();
                    @endphp</p>
                </div>
                <p class="fs-3 green p-dash">+ {{$transaction->amount}} $</p>
                      
                      


                </div> 
            </div>


                    
{{--                
                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="fs-6 p-dash ">تم ايداع مبلغ من   <span class="active">(5536)</span> المستخدم <span
                            class="active">خليفة القاضي</span></p>
                    <p class="fs-7 p-dash grey ">@php
                        echo now();
                    @endphp</p>
                </div>
                <p class="fs-3 green p-dash">+ 1000 $</p>
                      
                      


                </div> 
            </div> --}}

            @else
            <div class="card-wallet text-light p-3">
                <div class="d-flex justify-content-between align-items-center">
  
                    <div>
                        <p class="fs-6 p-dash ">تم سحب مبلغ    <span class="active">({{$transaction->amount}})</span> الى حساب مدير الموقع <span
                                class="active"> </span></p>
                        <p class="fs-7 p-dash grey ">@php
                            echo now();
                        @endphp</p>
                    </div>
                    <p class="fs-3 red p-dash">- {{$transaction->amount}} $</p>
  
  
                </div>
            </div>
  
 @endif

             @endforeach
        
      
        
        </div>
    </section>
@endsection
