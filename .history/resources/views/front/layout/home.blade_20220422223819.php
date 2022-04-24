<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <title>Cars Auction</title>

</head>
<!-- Font Family -->

<body class="fs-6 bg-darkgrey">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">

        <div class="cornerstyle position-absolute"></div>
        <div class="container-fluid w-96 my-2">

            <a class="navbar-brand border p-2 logo-box " href="#">CAC</a>
            <button class="bttn border-0 px-4 navbar-toggle me-5 pe-5" type="button">
                <div class="menu my-1 px-3 bg-light"> </div>
                <div class="menu bg-light"> </div>
            </button>
            <div class="collapse navbar-collapse justify-content-between">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 w-50  d-flex justify-content-between fs-7">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">العروض</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">المزايدة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">تواصل معنا
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">من نحن
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">تسجيل الدخول
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">انشاء حساب
                        </a>
                    </li>


                </ul>
                <button class="nav-item text-center border-0  contact text-light fs-6 py-2 px-4 m-auto">
                    <i class="fa fa-phone">&nbsp; 777 777 777</i>
                </button>
            </div>


        </div>
    </nav>
    <div class="fixed-top contact-parent vh-100">
        <div class="contactnavbar d-flex  align-content-between me-4 p-4 flex-wrap ">
            <div class="fa fa-facebook w-100 text-light"></div>
            <div class="fa fa-instagram w-100 text-light"></div>
            <div class="fa fa-whatsapp w-100 text-light"></div>
            <div class="fa fa-facebook w-100 text-light"></div>
        </div>


    </div>


    @yield('content')

    <!-- nav end -->
    <footer>
        <script src="{{ URL::asset('js/js.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    </footer>
</body>

</html>
