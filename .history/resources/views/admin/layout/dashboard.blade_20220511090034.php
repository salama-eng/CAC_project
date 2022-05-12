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

    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Cars Auction</title>
</head>


<body>

    <div class="d-flex">
        <div class="navbar-header2 my-5 justify-content-between d-none ">
            <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                <div class=" my-1 bg-light sidemenu"> </div>
                <div class="my-1 bg-light px-3  sidemenu"> </div>
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
                        <a href="{{ route('AdminDash') }}"
                            class="{{ Request::segment(1) === 'AdminDash' ? 'active' : 'text-light' }} text-center p-3">
                            الرئيسية</a>

                    </li>
                    <li class=" dropdown">
                        <a class="dropdown-toggle text-center text-light p-3 " data-toggle="collapse"
                            aria-expanded="false">إدارة
                            المزادات</a>
                    </li>
                    <ul class="collapse list-unstyled fs-6 mt-0" id="manage">
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'admin_posts' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('admin_posts') }}"
                                class="{{ Request::segment(1) === 'admin_posts' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">إدارة
                                طلبات تقديم المزاد</a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'Start_auction' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('Start_auction') }}"
                                class="{{ Request::segment(1) === 'Start_auction' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">إدارة
                                العروض</a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'admin_acution' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('admin_acution') }}"
                                class="{{ Request::segment(1) === 'admin_acution' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">إدارة
                                المزادات
                                الحالية</a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'un_complate' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('un_complate') }}"
                                class="{{ Request::segment(1) === 'un_complate' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">إدارة
                                المزادات المعلقة</a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'endede_acution' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('endede_acution') }}"
                                class="{{ Request::segment(1) === 'endede_acution' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">إدارة
                                المزادات المنتهية</a>
                        </li>

                    </ul>
                    <li>
                        <a href="{{ route('showAllUsers') }}"
                            class="text-center p-3 {{ Request::segment(1) === 'showAllUsers' ? 'active' : 'text-light' }}">إدارة
                            المستخدمين</a>

                    </li>
                    <li>
                        <a href="{{ route('admincategories') }}"
                            class="text-center p-3 {{ Request::segment(1) === 'admincategories' ? 'active' : 'text-light' }}">إدارة
                            تصنيفات
                            السيارات</a>

                    </li>
                    <li>
                        <a href="{{ route('adminPayments') }}"
                            class="text-center p-3 {{ Request::segment(1) === 'adminPayments' ? 'active' : 'text-light' }}">إدارة
                            طرق الدفع</a>

                    </li>



                    <li class="active dropdown2">
                        <a class="dropdown-toggle text-center text-light p-3" data-toggle="collapse"
                            aria-expanded="false">إدارة
                            محتويات الموقع</a>
                    </li>
                    <ul class="collapse list-unstyled fs-6 mt-0" id="manage2">
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'manage_home' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('manage_home') }}"
                                class="{{ Request::segment(1) === 'home_site' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">
                                ادارة
                                الصفحة
                                الرئيسية </a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'slider_image' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('slider_image') }}"
                                class="{{ Request::segment(1) === 'slider_image' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">
                                صور
                                السلايدر
                            </a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'membership' ? 'contact' : 'bg-light' }} my-auto branch"
                                style="height: 8px;width: 8px"></p><a href="{{ route('membership') }}"
                                class="{{ Request::segment(1) === 'membership' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">
                                ادارة
                                شركائنا</a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'manage_contact_us' ? 'contact' : 'bg-light' }} my-auto branch" style="height: 8px;width: 8px"></p><a
                                href="{{ route('manage_contact_us') }}" class="{{ Request::segment(1) === 'manage_contact_us' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2"> 
                               ادارة صفحة تواصل معنا
                            </a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'manage_about_us' ? 'contact' : 'bg-light' }} my-auto branch" style="height: 8px;width: 8px"></p><a
                                href="{{ route('manage_about_us') }}" class="{{ Request::segment(1) === 'manage_about_us' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">
                                 ادارة صفحة من نحن
                                </a>
                        </li>
                    </ul>

                    

                

                <li class="active dropdown3">
                        <a class="dropdown-toggle text-center text-light p-3" data-toggle="collapse"
                        aria-expanded="false">إدارة
                         رسائل الصفحة</a>
                        <ul class=" collapse list-unstyled fs-6 mt-0" id="manage3">
                            <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'manage_message' ? 'contact' : 'bg-light' }} my-auto branch" style="height: 8px;width: 8px"></p><a
                                href="{{ route('manage_message') }}" class="{{ Request::segment(1) === 'manage_message' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">
                                 الرسائل التي لم يرد عليها
                                </a>
                        </li>
                        <li class="d-flex align-items-center justify-content-center">
                            <p class="{{ Request::segment(1) === 'complet_message' ? 'contact' : 'bg-light' }} my-auto branch" style="height: 8px;width: 8px"></p><a
                                href="{{ route('complet_message') }}" class="{{ Request::segment(1) === 'complet_message' ? 'active' : 'text-light' }} text-center py-3 ps-3 pe-2">
                                 الرسائل التي تم الرد عليها
                                </a>
                        </li>

                        </ul>
                    </li>

                    <ul class="list-unstyled  fs-6 py-4">
                        <div class="d-flex flex-wrap justify-content-around w-50 m-auto">

                            <div class="fa fa-instagram  text-light fs-5"></div>
                            <div class="fa fa-whatsapp  text-light fs-5"></div>
                            <div class="fa fa-facebook text-light fs-5"></div>
                            <div class="fa  fa-envelope-o text-light fs-5"></div>
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

            <div class="text-light dirction me-auto mt-4 dropdown-notifications d-block ms-5">
                <div class="d-flex justify-content-end">
                  <div id="bell">
                    <p data-count="{{ auth()->user()->unreadNotifications()->count() }}"
                        class="fa fa-bell px-2 position-relative notif-count "><i
                            class="notiy  position-absolute"></i>{{ auth()->user()->unreadNotifications()->count() }}
                    </p>
                  </div>
                    <div id="wechat">
                        <p class="fa fa-wechat px-2"></p>
                    </div>
                    <div id="user">
                        <p class="fa fa-user px-2"></p>
                    </div>
                </div>
                <ul class="dropdown-menu notification bg-dark">
                    @if (isset(auth()->user()->unreadNotifications))
                        @foreach (auth()->user()->unreadNotifications as $notification)
                            <li>

                                <a class="dropdown-item text-light fs-7"
                                    href="{{ $notification->data['lesson']['link'] }}">{{ $notification->data['lesson']['title'] }}
                                    {{ auth()->user()->name }}
                                    <i class="semiOrange fs-8 "><br></i>{{ $notification->data['lesson']['body'] }}</a>
                                <p class="dropdown-divider mx-2"></p>
                            </li>
                        @endforeach
                    @endif

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
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('9ecc8e897a93aeee0ca1', {
        encrypted: true
    });

    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsCountElem = notificationsWrapper.find('p[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul.dropdown-menu');
    if (notificationsCount <= 0) {
        notificationsWrapper.hide();
      }

      // Enable pusher logging - don't include this in production
      // Pusher.logToConsole = true;



    var channel = pusher.subscribe('new-notifiction');
    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
        var existingNotifications = notifications.html();
        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
        var newNotificationHtml = `
        <li><a class="dropdown-item text-light fs-7" href="` + data.lesson.link + `"> ` + data.lesson.title + ` <?php echo auth()->user()->name; ?>
                <i class="semiOrange fs-8 "><br>` + data.lesson.body + `</i></a>
            <p class="dropdown-divider mx-2"></p>
        </li>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
        notificationsCount -= 1;
        notifications = 0;
    });
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
 
    tinymce.init({
  selector:'#textarea#default'
});

    </script>
</html>
