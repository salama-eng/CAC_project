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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Cars Auction</title>
</head>

<body>

<div class="d-flex flex-nowrap">

    <div class="wrapper d-flex align-items-stretch">
        <!-- Sidebar Holder -->
        <aside id="sidebar">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="cornerstyle px-4 pt-3">
                        <br>
                        <a class="navbar-brand border p-2 text-light mx-auto  rounded" href="#">CAC</a>
                    </div>
                </div>
                <div class="navbar-header">
                    <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                        <div class="menu my-1  bg-light"> </div>
                        <div class="menu bg-light"> </div>
                    </button>
                </div>
            </div>

            <ul class="list-unstyled components fs-5 mt-4">

                <li class="active dropdown">
                    <a class="dropdown-toggle text-center text-light" data-toggle="collapse" aria-expanded="false">إدارة
                        المزادات</a>
                    <ul class="collapse list-unstyled fs-6 me-5" id="manage">
                        <li><a href="#" class="text-light p-3">إدارة طلبات تقديم المزاد</a></li>
                        <li><a href="#" class="text-light p-3">إدارة العروض</a></li>
                        <li><a href="#" class="text-light p-3">إدارة المزادات الحالية</a></li>
                        <li><a href="#" class="text-light p-3">إدارة المزادات المنتهية</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="text-center p-3 text-light">إدارة المستخدمين</a>

                </li>
                <li>
                    <a href="#" class="text-center p-3 text-light">إدارة تصنيفات السيارات</a>

                </li>
                <li>
                    <a href="#" class="text-center p-3 text-light">إدارة موديل السيارة</a>

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
                <li><a class="nav-item btn contact text-light fs-5 py-2 m-5 mt-3"> <i class="fa fa-phone">&nbsp;
                            777(777)- 777</i></a>
                </li>
            </ul>
        </aside>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                            <li><a href="#">Page</a></li>
                        </ul>
                    </div>
                </div>
            </nav>




        </div>

    </div>


    <div class="w-100" style="background-image: url(assets/back.jpg) ; background-size: contain;">
      
      <hr class="m-0 text-white " >
      <!-- Example single danger button -->
<div class="d-flex flex-lg-row-reverse m-3 gap-4" >

  <div><img  class="rounded-circle" src="assets/images/avatar.jpg" alt="" width="32px" height=""></div>
 


  <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown button
    </button>
    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
      <li><a class="dropdown-item active" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </div>

  

  <div><img src="assets/icons/bell.png" alt="" width="32px" height=""></div>

</div>
 
      <hr class=" text-white " >
     
    @yield('content')
    {{-- <div style="background-repeat: no-repeat;
     background-image: url(assets/back.jpg); background-size:cover"></div>
</div>

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
