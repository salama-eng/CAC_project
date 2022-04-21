@extends('front.layout.clientdashboard')
@section('content')
    <h4 class="text-warning text-center m-2">
        المعلومات الشخصية
    </h4>

    <div class="profile-container d-flex g-2">

        <div class=" col-lg-3 col-8 d-flex flex-column align-items-center">
            <img src="assets/images/avatar.png" class="rounded-circle" alt="">
            <h5 class="text-white text-center col-lg-8 mt-4">جاك سبارو </h5>
            <div class="col-8 d-flex justify-content-center gap-2 mt-3">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">

            </div>

        </div>




        <div class=" col-lg-7 col-9 text-white">

            <h5 class="text-white">معلومات التواصل </h5>

            <div class=" d-grid">
             
              <h6>البريد الالكتروني </h6>
              <p>admin@gmail.com</p>

            </div>

        </div>


    </div>
@endsection
