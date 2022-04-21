@extends('client.layout.clientdashboard')
@section('content')
    <div class="profile-container d-flex flex-wrap g-5  align-items-center">

        <div class=" align-self-end col-lg-4 col-md-5 col-11 d-flex flex-column align-items-center">
            <img src="assets/images/avatar.png" class="rounded-circle " alt="">
            <p class="profilename fs-5 text-center col-lg-8 mt-4">جاك سبارو </p>
            <div class="col-8 d-flex justify-content-center gap-2 mt-2">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <em class=" text-white mx-2">8.8</em>
            </div>

            <a href="">
                <p class="editeprofile"> تعديل المعلومات الشخصية </p>
            </a>

        </div>




        <div class=" col-lg-5 col-md-5 col-11 m-lg-0 m-auto text-white text-end">
            <h4 class="text-warning text-center fs-4  m-2">
                المعلومات الشخصية
            </h4>
            <h5 class=" mt-5">معلومات التواصل </h5>

            <div>
                <table class="table-profile">

                    <tr>
                        <th>
                            البريد الالكتروني
                        </th>
                        <td>
                            admin@gmail.com
                        </td>
                    </tr>
                    <th>
                        رقم التلفون
                    </th>
                    <td>
                        +887 7007 7877
                    </td>
                    </tr>

                    <th>
                        العنوان
                    </th>
                    <td>
                        صنعاء التحرير
                    </td>
                    </tr>
                </table>
            </div>

            <h5 class=" mt-5">معلومات الدفع </h5>

            <div>
                <table class="table-profile">

                    <tr>
                        <th>
                            طريقة الدفع
                        </th>
                        <td>
                            admin@gmail.com
                        </td>
                    </tr>


                    <tr>
                        <th>
                            اسم البنك
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
