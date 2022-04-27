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
   
    <div class="login-container d-flex  align-items-center justify-content-around flex-column flex-wrap">

        <h2 class="font-weight-light yellow mb-5">اعادة ضبط كلمة المرور</h2>

            <div class="login-text col-lg-4 col-11 align-middle order-lg-1">
               <form action="{{route('resetPassword')}}" method="POST">
               @csrf

                <input type="text" name="email" class="text-white mb-0" value="{{old('email')}}" placeholder="ادخل الايميل ">
            @error('email')
            <span class="text-end yellow">* {{ $message }}  </span>
            @enderror

            <div class="d-flex justify-content-between mt-3">
                <a href="{{route('login')}}" class="btn btn-secondary w-25 my-3" data-bs-dismiss="modal">تراجع</a>
               <button type="submit" class=" my-3 w-50 rounded-0 " > ارسال الايميل </button>
           </div>
            </form>
            @if (session()->has('message'))
            {
            <p class="yellow text-center">{{ session()->get('message') }}</p>
            }
            @endif
           </div>
    </div>

</body>



</html>
