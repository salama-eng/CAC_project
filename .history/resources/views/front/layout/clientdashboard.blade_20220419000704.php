<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <title>Cars Auction</title>
</head>

<body>

    <div class="d-flex">
        <div class="wrapper d-flex align-items-stretch">
            <!-- Sidebar Holder -->
            <div class="navbar-header2 my-5 d-none">
                <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                    <div class=" my-1 px-3 bg-light sidemenu"> </div>
                    <div class=" bg-light sidemenu"> </div>
                </button>
            </div>
            <aside id="sidebar">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <div class="cornerstyle px-4 pt-3">
                            <br>
                            <a class="navbar-brand border p-2 text-light mx-auto logo-box" href="#">CAC</a>
                        </div>
                    </div>
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                            <div class="menu my-1  bg-light"> </div>
                            <div class="menu bg-light"> </div>
                        </button>
                    </div>

                </div>

                <ul class="list-unstyled components fs-6 mt-4">
                    <li>
                        <a href="#" class="text-center p-3 text-light">المعلومات الشخصية </a>

                    </li>
                    <li class="active dropdown">
                        <a class="dropdown-toggle text-center text-light pb-2" data-toggle="collapse"
                            aria-expanded="false">إدارة
                            طلبات اضافة مزاد</a>
                        <ul class="collapse list-unstyled fs-6" id="manage">
                            <li><a href="#" class="text-light text-center p-3"> اضافة مزاد  </a></li>
                            <li><a href="#" class="text-light text-center p-3">  عرض السيارات المضافة في المزاد  </a></li>
                            <li><a href="#" class="text-light text-center p-3"> عرض المزادات الغير مكتملة  </a></li>
                            <li><a href="#" class="text-light text-center p-3"> عرض المزادات المكتملة  </a></li>
                           

                        </ul>
                    </li>

                    <li class="active dropdown">
                        <a class="dropdown-toggle text-center text-light pb-2 " data-toggle="collapse"
                            aria-expanded="false">إدارة
                            طلبات  المزايدة</a>
                        <ul class="collapse list-unstyled fs-6 " id="manage">
                            <li><a href="#" class="text-light text-center p-3">  عرض السيارات  التي تمت المزايدة عليها   </a></li>
                            <li><a href="#" class="text-light text-center p-3"> عرض المزادات الغير مكتملة  </a></li>
                            <li><a href="#" class="text-light text-center p-3"> عرض المزادات المكتملة  </a></li>
                           

                        </ul>
                    </li>

                  

                </ul>

                <ul class="list-unstyled  fs-6 py-4">
                    <div class="d-flex flex-wrap justify-content-around w-50 m-auto">
                        <div class="fa fa-facebook  text-light"></div>
                        <div class="fa fa-instagram  text-light"></div>
                        <div class="fa fa-whatsapp  text-light"></div>
                        <div class="fa fa-facebook text-light"></div>
                        <div class="fa  fa-envelope-o text-light"></div>
                    </div>
                    <li><a class="nav-item text-center contact text-light fs-5 py-2 m-5 mt-3"> <i
                                class="fa fa-phone px-3 fs-5">&nbsp;
                                777(777)- 777</i></a>
                    </li>
                </ul>
            </aside>





            <!-- Page Content Holder -->



        </div>




        <div class="w-100" style="background-image: url(assets/back.jpg) ;
        background-size: contain;">

            <div class="text-light dirction me-auto mt-4">
              <div class="d-flex justify-content-end">
                <p class="fa fa-bell px-2 position-relative "><i class="notiy  position-absolute"></i></p>
                <p class="fa fa-wechat px-2"></p>
                <p class="fa fa-user px-2"></p>
</div>
                <ul class="dropdown-menu notification bg-dark">
                    <li><a class="dropdown-item text-light fs-7" href="#">تمت المزايدة على سيارة هويوندا
                            <i class="semiOrange fs-8 "><br>المشتري : احساس</i></a>
                        <p class="dropdown-divider mx-2"></p>
                    </li>

                    <li><a class="dropdown-item text-light fs-7" href="#">تمت المزايدة على سيارة هويوندا
                            <i class="semiOrange fs-8 "><br>المشتري : احساس</i></a>
                        <p class="dropdown-divider mx-2"></p>
                    </li>
                    <li><a class="dropdown-item text-light fs-7" href="#">تمت المزايدة على سيارة هويوندا
                            <i class="semiOrange fs-8 "><br>المشتري : احساس</i></a>
                        <p class="dropdown-divider mx-2"></p>
                    </li>
                </ul>




                <ul class="dropdown-menu bg-dark userinfo text-center">
                    <li>
                       <div class="d-flex flex-column justify-center">
                        <img src="assets/images/avatar.jpg" class=" rounded-circle m-auto mt-1 " width="50" alt="" >
                        <h6 class="dropdown-item text-light mt-3 " href="#">اسم المستخدم
                        </h6>
                    </div>
                    </li>


                    <li class="d-flex"> <img src="assets/icons/logout.png" class="  " width="20" height="20" alt="" > <a class="dropdown-item text-light " href="#">تسجيل الخروج</a>
                        <p class="dropdown-divider mx-2"></p>
                    </li>
                </ul>
            </div>
<hr class="text-white"> 
            <div class="w-100">

                @yield('content')
            </div>
        </div>
        {{-- <div style="background-repeat: no-repeat;
     background-image: url(assets/back.jpg); background-size:cover"></div>


    <img class="back-dash" src="assets/back.jpg" alt=""> --}}
    </div>
</body>


<footer>

    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/js.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>

</footer>

</html>
