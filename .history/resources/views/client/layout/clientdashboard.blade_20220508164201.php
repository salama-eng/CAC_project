<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Cars Auction</title>
</head>

<body>

    <div class="d-flex">
        <div class="navbar-header2  my-5 justify-content-between d-none ">
            <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                <div class=" my-1 px-3 bg-light sidemenu"> </div>
                <div class=" bg-light sidemenu"> </div>
            </button>
        </div>
        <div class="holder aside">
            <!-- Sidebar Holder -->

            <aside id="sidebar">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <div class="cornerstyle px-4 pt-3">
                            <br>
                            <a class="navbar-brand border p-2 text-light mx-auto logo-box1" href="#">CAC</a>
                        </div>
                    </div>
                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                            <div class="menu my-1  bg-light"> </div>
                            <div class="menu bg-light"> </div>
                        </button>
                    </div>

                </div>

                <ul class="list-unstyled components fs-6 mt-4 ">
                    <li>
                        <a href="{{route('UserDash')}}"></a><h5 class="text-center p-3 text-light"> الرئيسية</h5></a>

                    </li>
                    <li>
                       <a href="{{route('profile')}}"class="text-center p-3 text-light "><h5 >المعلومات الشخصية</h5></a> 

                    </li>
                    <li class="active dropdown">
                        <a class="dropdown-toggle text-warning text-center text-light pb-2" data-toggle="collapse"
                            aria-expanded="false"><h5>إدارة
                            طلبات إضافة مزاد</h5></a>
                        <ul class="collapse list-unstyled fs-6" id="manage">
                            <li><a href="{{route('addAuction')}}" class="text-light text-center p-3">إضافة مزاد</a></li>
                            <li><a href="{{route('postedcars')}}" class="text-light text-center p-3"> السيارات المضافة في المزاد</a></li>
                            <li><a href="{{route('UserUncomplatePosts')}}" class="text-light text-center p-3"> المزادات الغير مكتملة</a></li>
                            <li><a href="{{route('UserComplatePosts')}}" class="text-light text-center p-3"> المزادات المكتملة</a></li>

                        </ul>
                    </li>
                   
                    <li class="active dropdown2">
                        <a class="dropdown-toggle text-center text-light pb-2" data-toggle="collapse"
                        aria-expanded="false">إدارة
                        طلبات المزايدة</a>
                        <ul class="collapse list-unstyled fs-6" id="manage2">
                            <li><a href="{{route('AuctionCars')}}" class="text-light text-center p-3"> السيارات التي تمت المزايدة عليها</a></li>
                            <li><a href="{{route('UserUncomplateAuctions')}}" class="text-light text-center p-3"> المزادات الغير مكتملة</a></li>
                            <li><a href="{{route('UserComplateAuctions')}}" class="text-light text-center p-3"> المزادات المكتملة</a></li>


                        </ul>
                    </li>

<li>  <a href="{{route('profile')}}" class="card-link active text-center mt-5 mb-2"> العودة للرئيسية <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a></li>
                </ul>
              
                <ul class="list-unstyled  fs-6 py-4">
                    
                    <div class="d-flex flex-wrap justify-content-around w-50 m-auto">
                        <div class="fa fa-facebook  text-light"></div>
                        <div class="fa fa-instagram  text-light"></div>
                        <div class="fa fa-whatsapp  text-light"></div>
                        <div class="fa fa-facebook text-light"></div>
                        <div class="fa  fa-envelope-o text-light"></div>
                    </div>
                    <li class="w-100"><a
                            class="nav-item text-center contact text-light fs-5 py-2  mt-3 mx-5 d-block px-3">
                            777 777 777<i class="fa fa-phone px-2 fs-4"></i></a>
                    </li>
                </ul>
            </aside>



            <!-- Page Content Holder -->



        </div>




        <div class="w-100 bg-grey"  style="">

            <div class="text-light dirction me-auto mt-4">
              <div class="d-flex justify-content-end" >
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
                <ul class="dropdown-menu bg-dark userinfo text-center p-0">
                    <li>
                       <div class="d-flex flex-column justify-center">
                           <div class="bg-yellow p-2  mb-2 ">

                            @if (isset(Auth::user()->profile->avatar))
                            <img src="/images/{{Auth::user()->profile->avatar}}" width="80" class="rounded-circle "alt="{{Auth::user()->profile->avatar}}">
                        @else
                
                            <img src="/assets/images/avatar.png" class="rounded-circle" width="80" alt="avatar.png">
                
                
                    @endif
                           </div>
                        <h6 class="dropdown-item text-light mt-1  fs-7 " href="#"> 
                            {{Auth::user()->name}}
                        </h6>
                        <h6 class="dropdown-item text-light mt-1 mb-0 fs-7">
                            <a href="{{route('profile')}}">بروفايل المستخدم </a>
                        </h6>
                    </div>
                    </li>
                    <li><hr class="text-white mb-2 ">
                        <div  class="d-flex justify-content-center align-items-center p-2">
                        <a class="  text-light  fs-7 " href="{{route('logout')}}">تسجيل الخروج</a> 
                        <img src="assets/icons/logout.png" class=" m-1 " width="20" height="20" alt="" > 
                       </div>
                    </li>
                </ul>
            </div>
            <div class="dropdown-divider"></div>
            <div class="w-100  vh-100">


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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
 
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</footer>

</html>
