<!DOCTYPE html>
<html lang="en">

@extends('layouts.head')
@section('header')
@endsection
    <!-- Font Family -->

<body class="fs-6">
    <div class="fixed-top">
        <div class="cornerstyle"></div>
        <div class="contactnavbar d-flex  align-content-between me-4 p-4 flex-wrap">
            <div class="fa fa-facebook w-100 text-light"></div>
            <div class="fa fa-instagram w-100 text-light"></div>
            <div class="fa fa-whatsapp w-100 text-light"></div>
            <div class="fa fa-facebook w-100 text-light"></div>
        </div>


    </div>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top position-absolute top-0">

        <div class="container-fluid w-96 my-5">

            <a class="navbar-brand border p-2 rounded" href="#">CAC</a>
            <button class="bttn border-0 px-4" type="button">
                <div class="menu my-1 px-3 bg-light"> </div>
                <div class="menu bg-light"> </div>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 w-75 d-flex justify-content-between fs-7">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">العروض</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">المزايدة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">تواصل معنا
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">من نحن
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">تسجيل الدخول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">انشاء حساب
                        </a>
                    </li>


                </ul>
                <button class="nav-item btn contact text-light fs-5 py-2 px-4 m-auto">
                    <i class="fa fa-phone">&nbsp; 777 (777) - 777</i>
                </button>
            </div>


        </div>
    </nav>0


    <!-- nav end -->
@extends('layouts.footer')
@section('footer')
@endsection
</body>

</html>