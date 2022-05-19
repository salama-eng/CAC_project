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
                        <a alt="الصفحة الرئيسية" class="nav-link {{ Request::segment(1) === 'home' ? 'active' : 'text-light' }}"  href="{{ url('home' )}}">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a alt="العروض" class="nav-link   {{ Request::segment(1) === 'offers' ? 'active' : 'text-light' }}" href="{{ url('offers' )}}">العروض</a>
                    </li>
                    <li class="nav-item">
                        <a alt="المزادات" class="nav-link   {{ Request::segment(1) === 'auctions' ? 'active' : 'text-light' }}" href="{{ url('auctions' )}}">المزادات</a>
                    </li>
                    <li class="nav-item">
                        <a alt="تواصل معنا" class="nav-link   {{ Request::segment(1) === 'contact_us' ? 'active' : 'text-light' }}" href="{{ url('contact_us' )}}">تواصل معنا
                        </a>
                    </li>
                    <li class="nav-item">
                        <a alt="من نحن" class="nav-link   {{ Request::segment(1) === 'aboutUs' ? 'active' : 'text-light' }}" href="{{ url('aboutUs' )}}">من نحن
                        </a>
                    </li>
        
                </ul>
               @if (Auth::user()==null)
                  <a href="login">  <button class="nav-item text-center border-0  contact text-light fs-6 py-2 px-4 me-auto ms-5 ">
                        <i class="fa fa-sign-in"></i>&nbsp;تسجيل الدخول
                    </button></a>
                    @else

<!-- Example single danger button -->

<div class="dropdown mx-5">

    @if (isset(Auth::user()->profile->avatar))
    <img src="/images/{{Auth::user()->profile->avatar}}" class="rounded-circle dropdown-toggle nav-item  border-yellow   contact me-auto " id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" width="50" height="">
@else

<img src="/assets/images/avatar.png" class="rounded-circle dropdown-toggle nav-item  border-yellow   contact me-auto mx-5" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" width="50" height="">


@endif

  <style>.bg-noty
    {
     
     text-align: center;
      list-style: none;
      background: rgba(26, 26, 26, 0.5);
      border-radius: 10px;
      border: none;
      color: #ffb434;
      backdrop-filter: blur(5px);
      border-top: 6px solid #E39100;
      border-bottom: 6px solid #E39100;
    
    }
   
      </style> 

    <ul class="dropdown-menu bg-noty fs-7 p-0 " aria-labelledby="dropdownMenu2" style="width:13rem;">


        <li>
            
                <div class="bg-yellow p-2  mb-2 m-auto d-flex justify-content-center">

                 @if (isset(Auth::user()->profile->avatar))
                 <img src="/images/{{Auth::user()->profile->avatar}}" width="80" class="rounded-circle m-auto"alt="{{Auth::user()->profile->avatar}}">
             @else
     
                 <img src="/assets/images/avatar.png" class="rounded-circle m-auto" width="80" alt="avatar.png">
     
     
         @endif
                </div>
           
         </li>

      <li><p class="text-white text-light fs-5 mx-2 px-2 my-2" type=""> {{Auth::user()->name}}
   

     </p></li>
     

      <li><button class="dropdown-item   fs-6 mt-2" type="button">  <a href="{{route('profile')}}" class=" card-link active">البروفايل <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a></button></li>
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
               
                @if(isset($Information))
                @foreach($Information as $information)

               
                
                
                <a href="#" class="text-light w-100"><div class="{{$information->icon}} w-100 text-light"></div></a>
                
                <!-- <div class="fa fa-instagram w-100 text-light"></div>
                <div class="fa fa-whatsapp w-100 text-light"></div>
                <div class="fa fa-twitter w-100 text-light"></div> -->
               
               
                @endforeach
                @endif
            </div>


        </div>
    </nav>
<!-- nav end -->


    @yield('content')

    
    <button class=" smooth-up position-fixed border-0 bottom-3">
        <span class="fa fa-arrow-up"></span>
    </button>

    <footer class="position-relative z-10 mt-5">
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
                    <a href="{{ url('/' )}}" class="d-block text-light py-1">الرئيسية</a>
                    <a href="{{ url('offers' )}}" class="d-block text-light py-1">العروض</a>
                    <a href="{{ url('auctions' )}}" class="d-block text-light py-1">المزادات</a>
                    <a href="{{ url('aboutUs' )}}" class="d-block text-light py-1">عن الشركة</a>
                    <a href="{{ url('contact_us' )}}" class="d-block text-light py-1">خدماتنا</a>
                    <a href="{{ url('privacyPolicy' )}}" class="d-block text-light py-1">سياسة الخصوصية</a>
                    <a href="{{ url('faq' )}}" class="d-block text-light py-1">كيفية الاستخدام</a>
                </p>

            </div>
            <div class="mt-2 mt-lg-5 col-12 col-md-6 col-lg-2">
                <h6 class="active pt-3 pb-1">تواصل معنا</h6>
                @if(isset($Information))
                @foreach($Information as $information)

                <p class="text-light mt-3 "><i class="{{$information->icon}} ps-3 active"></i>{{$information->link}}</p>
                <!-- <p class="text-light my-2"><i class="fa fa-envelope-o ps-3 active"></i>cac@gmail.com</p>
                <p class="text-light my-2"><i class="fa fa-instagram ps-3 active"></i>@cacMazad</p>
                <p class="text-light my-2"><i class="fa fa-phone ps-3 active"></i> 777 777 777</p> -->
                @endforeach
                @endif
            </div>
            <form action=" {{route('message')}}" method="POST" enctype="multipart/form-data" class=" mt-2 mt-lg-5  contact-form col-12 col-md-6 col-lg-4  ">
                @csrf
                <h6 class="active w-100 pt-3 pb-1">إرسال رسالة</h6>
                <div class="d-flex mt-3">
                    <div class="mx-1">

                        <input type="text" placeholder="الاسم" name="name" class="d-block my-1 py-2 text-light">
                        @error('name')
                        <span class="text-end yellow"> {{ $message }}  </span>
                        @enderror
                        <input type="text" placeholder="الايميل" name="email" class="d-block my-1 py-2 text-light">
                        @error('email')
                        <span class="text-end yellow"> {{ $message }}  </span>
                        @enderror
                        <input type="text" placeholder="رقم الهاتف" name="phone" class="d-block my-1 py-2 text-light">
                        @error('phone')
                        <span class="text-end yellow"> {{ $message }}  </span>
                        @enderror
                    </div>
                    <div class="mx-1">
                        <textarea  id="" name="message" placeholder="نص الرسالة"
                            class=" py-2 text-light d-block px-sm-2 my-1"></textarea>
                        @error('message')
                        <span class="text-end yellow"> {{ $message }}  </span>
                        @enderror
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
