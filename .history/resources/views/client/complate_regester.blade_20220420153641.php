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
    <title> regester </title>

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

        <div class="login-image col-lg-6 col-11">

            <img class=" img-fluid" src="assets/car.png" alt="">

        </div>
          <div class="login-text col-lg-4 col-11 align-middle">
        <form class="mb-3" action="{{ route('do_login') }}" method="POST">
            @csrf
            @if (session()->has('message'))
            {
            <p class="alert alert-danger">{{ session()->get('message') }}</p>
            }
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
    
        @endif
                <h3 class="font-weight-light"> اتمام عملية التسجيل </h3>
               <div class=""> <input name="image" type="file" placeholder=" " class="col-"> <label class="col-3" for=""></label>صورة المستخدم</div>
               <div> <input name="text" type="text" placeholder=" "> <label for=""></label> العنوان </div>
               <div> <input name="text" type="text" placeholder=" "> <label for=""></label> رقم التلفون </div>
               <div> <input name="text" type="text" placeholder=" "> <label for=""></label> رقم التلفون </div>
                <button type="submit" name="">تسجيل الدخول</button>
        </form></div>
    </div>

</body>



</html>
