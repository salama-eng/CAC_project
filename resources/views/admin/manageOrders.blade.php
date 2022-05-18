@extends('admin.layout.dashboard')
@section('content')


        <h1 class="text-center fs-3  text-white mt-4"> ادارة المبيعات </h1>
        <div class="col-lg-4 col-8 mx-auto mb-5 mt-0">
            <span class="fa fa-search text-light"></span>
            <input type="text" placeholder=" ابحث عن سيارة " class="search-input w-100 px-5 text-light">
        </div>
        <div class="container container-for-input">
            @if (session()->has('success'))
                <div class="alert alert-success message">
                    {{ session()->get('success') }}
                </div>
            @endif

            <div class="table-responsive text-white ms-5">
                <table class="main-table manage-members text-center  table table-bordered  text-white">
                    <tr class="text-warning ">
                        <td class="text-warning">#ID</td>
                        <td class="text-warning">اسم المستخدم</td>
                        <td class="text-warning">الايميل</td>
                        <td class="text-warning">الهاتف</td>
                        <td class="text-warning">العنوان</td>
                        <td class="text-warning">معلومات المحفضة</td>
                        <td class="text-warning">التحكم</td>
                    </tr>
                 
                </table>
            </div>


        </div>
  
@endsection
