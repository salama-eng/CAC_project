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
               
            }
.container
{
    text-align: center;
    font-family: tajawal;
   color: #111;
   display:flex;
   justify-content:space-around;
   flex-wrap: wrap;
   align-items:center;
}
em
{
    color:#E39100;
}
.bg-yellow
{
    background-color:#E39100;
    color: #111;
    margin: 1rem;
    padding:0.6rem;
}

        </style>
    <title>Document</title>
</head>
<body>

    <div class="container d-flex flex-wrap">
        
        <div class="col-4">
        <img src="assets/images/email.png" width ="400" height=""alt=""></div>
        <h3>اهلا {{$data['name']}} </h3>
        <div  class="col-4">
        <p > نحن نرسل لك هذا الايميل ردا على رسالتك</p>
        <p>" {{$data['message']}} "</p>
        <p>{{$data['sendMessage']}}</p>
    </div></div>
</body>
</html>