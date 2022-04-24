<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <title> login </title>

</head>

<body style="width:100%; height:100%; background-repeat: no-repeat;
  background-image: url(assets/back.jpg); background-size:cover">

    <header class="login-header">

        <div class="yellow-box-login">

        </div>

        <div class="logo-box d-flex align-items-center">
            <h2 class="d-flex align-items-center ">CAC</h2>
        </div>
    </header>
   
    <div class="login-container d-flex  align-items-center justify-content-around flex-wrap">


            <div class="login-image col-lg-6 col-11 order-lg-2">

            <img class=" img-fluid" src="assets/car.png" alt="">

        </div>

          <div class="login-text col-lg-4 col-11 align-middle order-lg-1">
        <form class="mb-3" action="{{ route('do_login') }}" method="POST">
            @csrf

          
            @if (session()->has('message'))
            {
            <p class="message">{{ session()->get('message') }}</p>
            }
            @endif

                <h3 class="font-weight-light"> تسجيل الدخول </h3>
                <span class="text-end yellow">* {{ $errors->first() }}  </span>
                {{ $errors->has('email') ? ' has-error' : '' }}
                <input name="email" autocomplete="off" class="mt-4 mb-0" type="text" value="{{old('email')}}" placeholder="إسم المستخدم">
                 @error('email')
              <span class="text-end yellow">* {{ $message }}  </span>
                 @enderror
                <input name="password"  type="password" class="mt-4 mb-0"  placeholder="كلمة المرور">
                @error('password')
                <span class="text-end yellow">* {{ $message }}  </span>
                 @enderror
                <button type="submit" class="mt-4" name="">تسجيل الدخول</button>
                <div class=" text-center ">
                <p class="font-weight-light ">ليس لديك حساب ؟ <a href="register" class=" text-warning  text-decoration-none ">  انشاء حساب ؟ </a></p>             </div>


        </form>

        </div>
    </div>

</body>



</html>
