<!DOCTYPE html>
<html lang="en">
  @extends('layouts.Header')
  @section('header')
  @endsection
  <body>
    <header>
      <div class="header-container">
        <div class="head">
          <div class="yellow-box"></div>

          <div class="logo">
            <h2>CAC</h2>
          </div>
          <div>
            <div id="humb_icon" onclick="togglemobile(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
                </div>
          </div>
        </div>

        <div class="body">

            <ul>
           <li> <a href=""> إدارة المزادات   </a>  </li>
           <li> <a href=""> إدارة المزادات </a>  </li>
           <li> <a href="">  إدارة المزادات </a>  </li>
           <li> <a href="">  إدارة المزادات  </a>  </li>


        </div>

      
      </div>  
    </header>

    <div style="background-repeat: no-repeat;
    background-image: url(assets/back.jpg); background-size:cover"></div>

  </body>


</html>
