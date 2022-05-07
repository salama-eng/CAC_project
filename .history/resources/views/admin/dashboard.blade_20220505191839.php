@extends('admin.layout.dashboard')
@section('content')
    <section>
        <div class="dash-header col-lg-11  col-11 m-auto mt-5 d-flex justify-content-center align-items-center">


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

<div class="dash-content d-flex flex-wrap ustify-content-aroun m-auto" >

        <div class=" d-flex flex-wrap justify-content-around col-lg-6 col-12 m-auto mt-4 gap-2 ">
            <div>
                <div class="card-admin text-light p-3" style="width:12rem">
                    <div class="d-flex justify-content-between align-items-center">
                        <i class="yellow fs-1 bi bi-people-fill"></i>
                        <em class="fs-3">852</em>
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
                          <em class="fs-3">852</em>
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
                        <em class="fs-3">852</em>
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
                        <em class="fs-3">852</em>
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
                      <em class="fs-3 ">852</em>
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
                    <em class="fs-3 ">852</em>
                </div>
                <div>
                    <p class="fs-7 p-dash  grey"> عمليات الشراء الفاشلة </p>
                </div>
            </div>
        </div>

      
        </div>
  <div class="col-lg-6 col-6 mt-5">

      <div class="main-container">
        <div class="year-stats">
          <div class="month-group">
            <div class="bar h-100"></div>
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
        </div>
    
        <div class="stats-info">
          <div class="graph-container">
            <div class="percent">
              <svg viewBox="0 0 36 36" class="circular-chart">
                <path class="circle" stroke-dasharray="100, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
                <path class="circle" stroke-dasharray="85, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
                <path class="circle" stroke-dasharray="60, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
                <path class="circle" stroke-dasharray="30, 100" d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831" />
              </svg>
            </div>
            <p>Total: $2075</p>
          </div>
    
          <div class="info">
            <p>Most expensive category <br /><span>Restaurants & Dining</span></p>
            <p>Updated categories <span>2</span></p>
            <p>Bonus payments <span>$92</span></p>
          </div>
        </div>
      </div>
  


  </div>


</div>
    </section>
@endsection
