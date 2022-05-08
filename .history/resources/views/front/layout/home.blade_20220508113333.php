<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
    <title>Cars Auction</title>

</head>
<!-- Font Family -->

<body class="fs-6 bg-darkgrey">
    <nav class="navbar navbar-expand-xl navbar-dark fixed-top">
        <button class="bttn border-0  navbar-toggle" type="button">
            <div class="menu my-1 px-3 bg-light"> </div>
            <div class="menu bg-light"> </div>
        </button>
        <div class="cornerstyle position-absolute"></div>
        <div class="container-fluid w-96 my-2">

            <a class="navbar-brand border  logo-box d-flex align-items-center justify-content-center" href="home">CAC</a>
      
            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav mx-auto  d-flex justify-content-between fs-7">
                    <button class="bttn border-0  navbar-toggle toggle" type="button">
                        <div class="menu my-1 px-3 bg-light"> </div>
                        <div class="menu bg-light"> </div>
                    </button>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(1) === 'home' ? 'active' : 'text-light' }}"  href="{{ url('home' )}}">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   {{ Request::segment(1) === 'offers' ? 'active' : 'text-light' }}" href="{{ url('offers' )}}">العروض</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   {{ Request::segment(1) === 'auctions' ? 'active' : 'text-light' }}" href="{{ url('auctions' )}}">المزادات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   {{ Request::segment(1) === 'contact_us' ? 'active' : 'text-light' }}" href="{{ url('contact_us' )}}">تواصل معنا
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   {{ Request::segment(1) === 'aboutUs' ? 'active' : 'text-light' }}" href="{{ url('aboutUs' )}}">من نحن
                        </a>
                    </li>
                   


                </ul>
               @if (Auth::user()==null)
                    <button class="nav-item text-center border-0  contact text-light fs-6 py-2 px-4 me-auto ms-5 ">
                        <i class="fa fa-sign-in"></i>&nbsp;تسجيل الدخول
                    </button>
                    @else

<!-- Example single danger button -->

<div class="dropdown">

    @if (isset(Auth::user()->profile->avatar))
    <img src="/images/{{Auth::user()->profile->avatar}}" class="rounded-circle dropdown-toggle nav-item  border-yellow   contact me-auto mx-5" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" width="50" height="">
@else

<img src="/assets/images/avatar.png" class="rounded-circle dropdown-toggle nav-item  border-yellow   contact me-auto mx-5" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" width="50" height="">


@endif

   

    <ul class="dropdown-menu bg-dark text-right yellow text-right" aria-labelledby="dropdownMenu2">

      <li><button class="dropdown-item text-white  " type="button"> {{Auth::user()->name}}
        

     </button></li>
      <li><button class="dropdown-item text-white  text-right" type="button">  {{Auth::user()->email}}</button></li>
     

      <li><button class="dropdown-item" type="button">  <a href="{{route('profile')}}" class="card-link active text-center mt-5 mb-2">البروفايل <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a></button></li>
      <li><hr class="text-white mb-2 ">
        <div  class="d-flex justify-content-center align-items-center p-2">
        <a class="  text-light  fs-7 " href="{{route('logout')}}">تسجيل الخروج</a> 
        <img src="/assets/icons/logout.png" class=" m-1 " width="20" height="20" alt="" > 
       </div>
    </li>
    </ul>
  </div>
                    @endif
                        
               
                   
            </div>

        </div>
        <div class="fixed-top contact-parent vh-100">
            <div class="contactnavbar d-flex  align-content-between  p-4 flex-wrap ">
                <div class="fa fa-facebook w-100 text-light"></div>
                <div class="fa fa-instagram w-100 text-light"></div>
                <div class="fa fa-whatsapp w-100 text-light"></div>
                <div class="fa fa-twitter w-100 text-light"></div>
            </div>


        </div>
    </nav>
<!-- nav end -->


    @yield('content')

    
    <button class=" smooth-up position-fixed border-0 bottom-3">
        <span class="fa fa-arrow-up"></span>
    </button>

    <footer>
        <div class="container-fluid  d-flex mx-auto w-75 justify-content-between flex-wrap">
            <div class="cornerstyle d-flex align-items-center my-lg-auto ">
                <a class="navbar-brand border   d-flex align-items-center justify-content-center text-light p-2"
                    href="/home">CAC</a>

            </div>
            <div class="mt-2 mt-lg-5 col-12 col-md-6 col-lg-2 ">
                <h6 class="active pt-3 pb-1">عن الشركة</h6>
                <p class="text-light mt-3 ">
                    شركة كاك هي الطريقة الأسرع و الأسهل
                    و الأكثر أمانا لبيع سياراتك بغض النظر عن
                    الشروط</p>

            </div>
            <div class="mt-2 mt-lg-5 col-12 col-md-6 col-lg-2">
                <h6 class="active pt-3 pb-1">تصفح <i class="fa fa-arrow-left"></i></h6>
                <p class="text-light mt-3">
                    <a href="/home" class="d-block text-light py-1">الرئيسية</a>
                    <a href="/offers" class="d-block text-light py-1">العروض</a>
                    <a href="/auctions" class="d-block text-light py-1">المزادات</a>
                    <a href="/aboutUs" class="d-block text-light py-1">عن الشركة</a>
                    <a href="/contact_us" class="d-block text-light py-1">خدماتنا</a>
                    <a href="" class="d-block text-light py-1">كيفية الاستخدام</a>
                </p>

            </div>
            <div class="mt-2 mt-lg-5 col-12 col-md-6 col-lg-2">
                <h6 class="active pt-3 pb-1">تواصل معنا</h6>
                <p class="text-light mt-3 "><i class="fa  fa-globe ps-3 active"></i>www.cac.com</p>
                <p class="text-light my-2"><i class="fa fa-envelope-o ps-3 active"></i>cac@gmail.com</p>
                <p class="text-light my-2"><i class="fa fa-instagram ps-3 active"></i>@cacMazad</p>
                <p class="text-light my-2"><i class="fa fa-phone ps-3 active"></i> 777 777 777</p>

            </div>
            <form action="" class=" mt-2 mt-lg-5  contact-form col-12 col-md-6 col-lg-4  ">
                <h6 class="active w-100 pt-3 pb-1">إرسال رسالة</h6>
                <div class="d-flex mt-3">
                    <div class="mx-1">

                        <input type="text" placeholder="الاسم" class="d-block my-1 py-2 text-light">
                        <input type="text" placeholder="الايميل" class="d-block my-1 py-2 text-light">
                        <input type="text" placeholder="رقم الهاتف" class="d-block my-1 py-2 text-light">
                    </div>
                    <div class="mx-1">
                        <textarea name="" id=""  placeholder="نص الرسالة"
                            class=" py-2 text-light d-block px-sm-2 my-1"></textarea>
                        <button class=" text-light rounded-0 py-2">
                            ارسال
                        </button>
                    </div>
                </div>
               
            </form>

        </div>
    </footer>
    <script src="{{ URL::asset('js/js.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
