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
    <title> Resend Email </title>

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

    <p class="font-weight-light text-white ">يرجى مراجعة الايميل المستخدم في عملية انشاء حساب لتفعيل حسابك</p>
           <h3 class="font-weight-light text-white"> هل تريد اعادة ارسال الايميل</h1>


           <div class="login-text">
           <form action="{{route('resendEmail')}}" method="POST">
               @csrf
               <input type="hidden" name="name" value="{{$email_data['name']}}">
               <input type="hidden" name="email" value="{{$email_data['email']}}">
               <input type="hidden" name="activation_url" value="{{$email_data['activation_url']}}">
               <button type="submit" class=" " >اعادة ارسال الايميل </button>
           </form>
           </div>
    </div>

</body>



</html>
