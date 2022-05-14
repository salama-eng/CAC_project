@extends('admin.layout.dashboard')
@section('content')
    <section class="col-11 m-auto">

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

<div class="dash-content d-flex flex-wrap justify-content-around m-auto" >

        <div class=" d-flex flex-wrap justify-content-around col-lg-5 col-12 mt-4 gap-3 m-auto">
            <div>
                <div class="card-admin text-light p-3" style="width:12rem">
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="yellow fs-1 bi bi-people-fill"></i>
                        <em class="fs-3">{{$users}}</em>
                    </div>
                    <div>
                        <p class="fs-7 p-dash grey">عدد مستخدمي الموقع</p>
                    </div>
                </div>
            </div>

              <div>
                  <div class="card-admin text-light p-3" style="width:12rem">
                      <div class="d-flex justify-content-between align-items-center">
                        <i class="yellow fs-1 bi bi-graph-up"></i>
                          <em class="fs-3">{{$Auctions}}</em>
                      </div>
                      <div>
                          <p class="fs-7 p-dash grey">عدد المزايدات في الموقع</p>
                      </div>
                  </div>
              </div>

              <div>
                <div class="card-admin text-light p-3" style="width:12rem">
                    <div class="d-flex justify-content-between align-items-center">
                      <i class="yellow fs-1 bi bi-graph-up-arrow"></i>
                        <em class="fs-3">{{$posts_now}}</em>
                    </div>
                    <div>
                        <p class="fs-7 p-dash grey">عدد العروض في الموقع</p>
                    </div>
                </div>
            </div>

              <div>
                <div class="card-admin text-light p-3" style="width:12rem">
                    <div class="d-flex justify-content-between align-items-center">
                      <i class=" yellow fs-1 bi bi-clipboard-data-fill"></i>
                        <em class="fs-3">{{$posts}}</em>
                    </div>
                    <div>
                        <p class="fs-7 p-dash grey">عدد السيارات  في الموقع</p>
                    </div>
                </div>
            </div>

            <div>
              <div class="card-admin text-light p-3" style="width:12rem">
                  <div class="d-flex justify-content-between align-items-center">
                      <i class="yellow fs-1 bi bi-cart3"></i>
                      <em class="fs-3 ">{{$orders}}</em>
                  </div>
                  <div>
                      <p class="fs-7 p-dash  grey"> عمليات الشراء في الموقع</p>
                  </div>
              </div>
          </div>

          <div>
            <div class="card-admin text-light p-3" style="width:12rem">
                <div class="d-flex justify-content-between align-items-center">
                    <i class="yellow fs-1 bi bi-cart-x-fill"></i>
                    <em class="fs-3 ">{{$posts_uncomplate}}</em>
                </div>
                <div>
                    <p class="fs-7 p-dash  grey"> عمليات الشراء الغير مكتملة </p>
                </div>
            </div>
        </div>
      </div>
  <div class="col-lg-6 col-6 mt-5 m-auto">
      <div class="main-container m-auto ">
      <div class=" d-flex flex-row-reverse year-stats">
      @foreach($years as $year)
      <p>{{$year['year']}}</p>
          <div class=" h-100 " style="direction: ltr;">
          
          @foreach($year['content'] as $content)
            <div class="month-group ">
            <canvas class="bar" style="height:100%;width:0.01px;background-color:transparent"  ></canvas>

            @if($content['count'])
            <canvas class="bar " style="height:{{(($content['count'] / $year['yearCount']) * 100)}}%"  ></canvas>
            @else
            <canvas class="bar" style="height:0.5%"  ></canvas>
            @endif

            <p class="month">{{$content['month']}}</p>
            </div>
          @endforeach
          </div>
        @endforeach
        </div>
        <!-- <div class="year-stats">
          <div class="month-group">
            <div class="bar h-{{$users*5}}"></div>
            <p class="month">Jan</p>
          </div>
          <div class="month-group">
            <div class="bar h-50"></div>
            <p class="month">Feb</p>
          </div>
          <div class="month-group">
            <div class="bar h-75"></div>
            <p class="month">Mar</p>
          </div>
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Apr</p>
          </div>
          <div class="month-group selected">
            <div class="bar h-100"></div>
            <p class="month">May</p>
          </div>
          <div class="month-group">
            <div class="bar h-50"></div>
            <p class="month">Jun</p>
          </div>
          <div class="month-group">
            <div class="bar h-75"></div>
            <p class="month">Jul</p>
          </div>
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Aug</p>
          </div>
          <div class="month-group">
            <div class="bar h-50"></div>
            <p class="month">Sep</p>
          </div>
          <div class="month-group">
            <div class="bar h-75"></div>
            <p class="month">Oct</p>
          </div>
          <div class="month-group">
            <div class="bar h-25"></div>
            <p class="month">Nov</p>
          </div>
          <div class="month-group">
            <div class="bar h-100"></div>
            <p class="month">Dez</p>
          </div>
        </div> -->
    
        <div class="stats-info">
          <div class="pie mb-4 position-relative" style=" width: 130px;
            height: 130px;
            background-image:conic-gradient(#5397d6 {{($n_order_posts)}}%,
            #4cc790 {{($n_order_posts)}}% {{($n_order_posts + $n_un_complated_auctions)}}%,
            #915db1 {{($n_order_posts + $n_un_complated_auctions)}}% {{($n_order_posts + $n_un_complated_auctions + $n_active_auctions)}}%,
            #e59f3c {{($n_order_posts + $n_un_complated_auctions + $n_active_auctions)}}% );
            border-radius: 50%">
            <div class=" rounded-circle  w-75 h-75 text-white mb-3 d-flex position-absolute justify-content-center align-items-center" style="left: 13%;
              top: 13%; background-color:#191919;">
              Total : {{$posts}}
            </div>
          </div>

          <div class="info my-3">
            <p><i class="fa fa-square mx-2" style="color:#5397d6;" aria-hidden="true"></i>المزادات المكتملة  </p>
            <p><i class="fa fa-square mx-2" style="color:#4cc790;" aria-hidden="true"></i>المزادات الغير مكتملة  </p>
            <p><i class="fa fa-square mx-2" style="color:#915db1;" aria-hidden="true"></i>المزادات الحالية </p>
            <p><i class="fa fa-square mx-2" style="color:#e59f3c;" aria-hidden="true"></i>  التي لم يحصل لها مزايدة </p>
          </div>
        </div>
      </div>
  


  </div> 


</div>
    </section>
@endsection
