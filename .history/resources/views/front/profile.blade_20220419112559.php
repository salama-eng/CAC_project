@extends('front.layout.clientdashboard')
@section('content')
    <h4 class="text-warning text-center m-2">
        المعلومات الشخصية
    </h4>

    <div class="profile-container d-flex flex-wrap g-2">

        <div class=" col-lg-3 col-12 d-flex flex-column align-items-center">
            <img src="assets/images/avatar.png" class="rounded-circle " alt="">
            <p class="text-white text-center col-lg-8 mt-4">جاك سبارو </p>
            <div class="col-8 d-flex justify-content-center gap-2 mt-3">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">

            </div>

        </div>




        <div class=" col-lg-4 col-12 text-white text-end">

            <h5 class="text-white">معلومات التواصل </h5>

            <div>
             <table>

              <tr>
                <th>
                  البريد الالكتروني
                </th>
                <td>
                  admin@gmail.com
                </td>
              </tr>
             </table>
             

            </div>

        </div>


    </div>
@endsection
