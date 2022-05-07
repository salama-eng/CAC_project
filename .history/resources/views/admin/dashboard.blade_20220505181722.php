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

        <div class="dash-content d-flex flex-wrap justify-content-around col-11 gap-2">
            <div>
                <div class="card-admin text-light col-3" >
                    <div>
                        <i class="yellow bi bi-people-fill"></i>
                        <em>852</em>
                    </div>
                    <div>
                        <p>عدد مستخدمي الموقع</p>
                    </div>
                </div>


                <div>
                  <div class="card-admin text-light m-auto  col-3" style="width: 18rem;">
                      <div>
                          <i class="yellow bi bi-people-fill"></i>
                          <em>852</em>
                      </div>
                      <div>
                          <p>عدد مستخدمي الموقع</p>
                      </div>
                  </div>

                  <div>
                    <div class="card-admin text-light m-auto  col-3" style="width: 18rem;">
                        <div>
                            <i class="yellow bi bi-people-fill"></i>
                            <em>852</em>
                        </div>
                        <div>
                            <p>عدد مستخدمي الموقع</p>
                        </div>
                    </div>



            </div>
        </div>


    </section>
@endsection
