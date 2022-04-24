<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <title>Cars Auction</title>
</head>

<body>
 
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">

        <div class="cornerstyle position-absolute"></div>
        <div class="container-fluid w-96 my-2">

            <a class="navbar-brand border p-2 logo-box " href="#">CAC</a>
            <button class="bttn border-0 px-4 navbar-toggle me-5 pe-5" type="button">
                <div class="menu my-1 px-3 bg-light"> </div>
                <div class="menu bg-light"> </div>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0 w-75 d-flex justify-content-between fs-7">
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


    <section class="d-flex container mt-5  flex-wrap">
        <section class="col-lg-4 col-sm-10 mt-5">
            <div id="carouselExampleControls" class="carousel slide col-12 mt-5" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL::asset('images/main.png') }}" class="d-block w-100 main-img" alt="...">
                    </div>


                </div>

                <div class="col-lg-12 col-sm-12 d-flex flex-wrap justify-content-between">
                    <div class="">
                        <img src="{{ URL::asset('images/1.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." style="border:1px solid #e3911e"
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/2.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/3.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/4.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/5.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/6.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/7.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/8.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/9.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                    <div class="">
                        <img src="{{ URL::asset('images/10.jpg') }}" class="img-fluid mt-3 img-responsive" alt="..." 
                            >
                    </div>
                </div>

        </section>
        <section class="col-10  col-lg-4 mt-5">
            <div class="card mt-5 me-4">
                
                <ul class="list-group list-group-flush ">
                  <li class="list-group-item w-100 d-flex justify-content-between">
                      <p>اسم السياره</p>
                      <p>pmw</p>
                  </li>
                  <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>الصنف</p>
                    <p>تويوتا</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>موديل السياره</p>
                    <p>2006</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> نوع المحرك</p>
                    <p>أوتوماتك</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> تاريخ انتهاء المزاد</p>
                    <p>2022 - 5 -17</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>  سعر السيارة البدائي </p>
                    <p>$2000</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>  مقدار الزيادة كأدنى حد</p>
                    <p>$50</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>  لون السيارة</p>
                    <p>اسود</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> العنوان</p>
                    <p>حدة</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p> نوع الضرر</p>
                    <p>سطحي</p>
                </li>
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>حالة السياره</p>
                    <p>مستخدم</p>
                </li>
                
                <li class="list-group-item w-100 d-flex justify-content-between">
                    <p>الوصف</p>
                    <p>pmw</p>
                </li>
                </ul>
              
              </div>
        </section>

    </section>

    <footer>
        <script src="{{ URL::asset('js/js.js') }}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    </footer>
</body>

</html>
