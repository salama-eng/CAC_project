
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">

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
  <div id="container" class="col-12 ">

    <main class="">
      <header class="d-flex justify-content-end align-items-center gap-5 text-end">
      
        <div class="col-3 ">
          <h2>    {{Auth::user()->name}} </h2>
          <h3>already 1902 messags</h3>
        </div>
        <img src="/images/{{Auth::user()->profile->avatar}}" width="80" class=" rounded-circle "alt="{{Auth::user()->profile->avatar}}">
      </header>
      <ul id="chat" class="" style="height:70vh">
        <li class="you">
          <div class="entete">
            <span class="status green"></span>
            <h2>Vincent</h2>
            <h3>10:12AM, Today</h3>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
          </div>
        </li>
        <li class="me">
          <div class="entete">
            <h3>10:12AM, Today</h3>
            <h2>Vincent</h2>
            <span class="status blue"></span>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
          </div>
        </li>
          <li class="me">
          <div class="entete">
            <h3>10:12AM, Today</h3>
            <h2>Vincent</h2>
            <span class="status blue"></span>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
          </div>
        </li>
        <li class="me">
          <div class="entete">
            <h3>10:12AM, Today</h3>
            <h2>Vincent</h2>
            <span class="status blue"></span>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            OK
          </div>
        </li>
        <li class="you">
          <div class="entete">
            <span class="status green"></span>
            <h2>Vincent</h2>
            <h3>10:12AM, Today</h3>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
          </div>
        </li>
        <li class="me">
          <div class="entete">
            <h3>10:12AM, Today</h3>
            <h2>Vincent</h2>
            <span class="status blue"></span>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
          </div>
        </li>
        <li class="me">
          <div class="entete">
            <h3>10:12AM, Today</h3>
            <h2>Vincent</h2>
            <span class="status blue"></span>
          </div>
          <div class="triangle"></div>
          <div class="messag">
            OK
          </div>
        </li>
      </ul>
      <div class="d-flex col-12 justify-content-around ">
      <input class="d-flex col-9 "type="text">
      <input class="d-flex col-2 "type="submit">
       
      </div>
    </main>
  </div>
</body>
</html>


<style>



*{
	box-sizing:border-box;
  font-family: Tajawal;
}
body{
	background-color:#191919;
	font-family:Arial;
 
}
#container{
	width:750px;
	height:110vh;
	background:#1C1C1C;
	margin:0 auto;
  color:#FFFFFF;
	font-size:0;
	border-radius:5px;
	overflow:hidden;
}

main{

	height:110vh;
	display:inline-block;
	font-size:15px;
	vertical-align:top;
}




h2,h3{
	margin:0;
}


.status{
	width:8px;
	height:8px;
	border-radius:50%;
	display:inline-block;
	margin-right:7px;
}
.green{
	background-color:#58b666;
}
.orange{
	background-color:#ff725d;
}
.blue{
	background-color:#6fbced;
	margin-right:0;
	margin-left:7px;
}

main header{
	height:110px;
  

}

main header img:first-child{
	border-radius:50%;
}

main header h2{
	font-size:16px;
	margin-bottom:5px;
}
main header h3{
	font-size:14px;
	font-weight:normal;
	color:#7e818a;
}

#chat{
	padding-left:0;
	margin:0;
	list-style-type:none;
	overflow-y:scroll;
	height:535px;
	border-top:2px solid #fff;
	border-bottom:2px solid #fff;
}
#chat li{
	padding:10px 30px;
}
#chat h2,#chat h3{
	display:inline-block;
	font-size:13px;
	font-weight:normal;
}
#chat h3{
	color:#bbb;
}
#chat .entete{
	margin-bottom:5px;
}
#chat .messag{
	padding:20px;
	color:#fff;
	line-height:25px;
	max-width:90%;
	display:inline-block;
	text-align:left;
	border-radius:5px;
}
#chat .me{
	text-align:right;
}
#chat .you .messag{
	background-color:#58b666;
}
#chat .me .messag{
	background-color:#6fbced;
}
#chat .triangle{
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 10px 10px 10px;
}
#chat .you .triangle{
		border-color: transparent transparent #58b666 transparent;
		margin-left:17px;
}
#chat .me .triangle{
		border-color: transparent transparent #6fbced transparent;
		margin-left:580px;
}

main footer{
	height:155px;
	padding:20px 30px 10px 20px;
}
main footer textarea{
	resize:none;
	border:none;
	display:block;
	width:100%;
	height:80px;
	border-radius:3px;
	padding:20px;
	font-size:13px;
	margin-bottom:13px;
}
main footer textarea::placeholder{
	color:#ddd;
}
main footer img{
	height:30px;
	cursor:pointer;
}
main footer a{
	text-decoration:none;
	text-transform:uppercase;
	font-weight:bold;
	color:#6fbced;
	vertical-align:top;
	margin-left:333px;
	margin-top:5px;
	display:inline-block;
}

</style>
