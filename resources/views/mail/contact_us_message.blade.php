<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">


        <style>
            body
            {
            direction: rtl;
            }
.container
{
    text-align: center;
    font-family: tajawal;
   color: #111;
   border: 2px solid #E39100;
   width: fit-content;
   padding: 20px;
   margin: auto;
}
h2{
    color: #E39100;
}

        </style>
    <title>Document</title>
</head>
<body>

   <h2>مرحبا لديك رسالة جديدة من {{$name}}</h2>
<div>
    <h3>تفاصيل المرسل</h3>
    <p>
    الاسم :  {{ $name }}<br>
    الايميل:  {{ $email }}<br>
    الهاتف :  {{ $phone }}<br>
    </p>
</div>
<div>
    <h3>نص الرسالة : </h3>
    <p> {{$messages}}</p>
</div>

</body>
</html>