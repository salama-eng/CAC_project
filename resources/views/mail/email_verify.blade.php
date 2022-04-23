<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>اهلا {{$data['name']}} مرحبا بك معنا في   CAC</h1>
    <p>CAC هو موقع للمزايدة على سيارات نتمنى ان نقد لكم الخدمة المطلوبه </p>
    <p>لتفعيل حسابك يرجى الضغط على الزر في الاسفل</p>

    <!-- <a href="{{$data['activation_url']}}">here</a> -->
    <form action="{{$data['activation_url']}}" method="POST">
        @csrf
        
        <input type="hidden" name="id" value="{{$data['id']}}">
        <input type="submit" value="تفعيل الحساب">
    </form>
</body>
</html>