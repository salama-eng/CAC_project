<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
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
    <title> Reset Password </title>

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
   
    <div class="login-container d-flex align-items-center justify-content-around flex-column flex-wrap">

        <h2 class="font-weight-light yellow mb-5">اعادة ضبط كلمة المرور</h2>

            <div class="login-text col-lg-4 col-11 align-middle order-lg-1">
           <form action="{{route('new_password')}}" method="POST">
               @csrf
                <input type="hidden" name="id" value="{{$userInfo->id}}">

                <input type="text" name="email" value="{{$userInfo->email}}" placeholder="ادخل الايميل " class="text-white mb-0"
                    aria-describedby="basic-addon3">
                @error('email')
                <span class="text-end yellow">* {{ $message }}  </span>
                @enderror

                <input type="password" name="password" class="text-white mt-4 mb-0" placeholder="كلمة المرور الجديدة">
            @error('password')
              <span class="text-end yellow">* {{ $message }}  </span>
              @enderror

                <input type="password" name="confirm_pass" class="text-white mt-4 mb-0" placeholder="تأكيد كلمة المرور">
            @error('confirm_pass')
              <span class="text-end yellow">* {{ $message }}  </span>
              @enderror

              <button type="submit" class=" my-4 rounded-0 " > ارسال الايميل </button>
            </form>
            @if (session()->has('message'))
            {
            <p class="yellow">{{ session()->get('message') }}</p>
            }
            @endif
           </div>
    </div>

</body>



</html>
