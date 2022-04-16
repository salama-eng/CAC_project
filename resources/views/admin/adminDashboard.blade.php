<!DOCTYPE html>
<html lang="en">

@extends('layouts.head')
@section('header')
@endsection

<body>

</body>

<div class="wrapper d-flex align-items-stretch">
    <!-- Sidebar Holder -->
    <aside id="sidebar">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="cornerstyle px-4 pt-3">
                    <br>
                    <a class="navbar-brand border p-2 text-light mx-auto  rounded" href="#">CAC</a>
                </div>
            </div>
            <div class="navbar-header">
                <button type="button" id="sidebarCollapse" class="bttn border-0 px-4">
                    <div class="menu my-1  bg-light"> </div>
                    <div class="menu bg-light"> </div>
                </button>
            </div>
        </div>
       
        <ul class="list-unstyled components fs-5 mt-4">

            <li class="active dropdown">
                <a class="dropdown-toggle text-center text-light" data-toggle="collapse" aria-expanded="false">إدارة المزادات</a>
                <ul class="collapse list-unstyled fs-6 me-5" id="manage">
                    <li><a href="#" class="text-light p-3">إدارة طلبات تقديم المزاد</a></li>
                    <li><a href="#" class="text-light p-3">إدارة العروض</a></li>
                    <li><a href="#" class="text-light p-3">إدارة المزادات الحالية</a></li>
                    <li><a href="#" class="text-light p-3">إدارة المزادات المنتهية</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#" class="text-center p-3 text-light">إدارة المستخدمين</a>
               
            </li>
            <li>
                <a href="#" class="text-center p-3 text-light">إدارة تصنيفات السيارات</a>
               
            </li>
            <li>
                <a href="#" class="text-center p-3 text-light">إدارة موديل السيارة</a>
               
            </li>
         
        </ul>

        <ul class="list-unstyled  fs-6 py-4">
            <div class="d-flex flex-wrap justify-content-around w-50 m-auto">
                <div class="fa fa-facebook  text-light"></div>
                <div class="fa fa-instagram  text-light"></div>
                <div class="fa fa-whatsapp  text-light"></div>
                <div class="fa fa-facebook text-light"></div>
                <div class="fa  fa-envelope-o text-light"></div>
            </div>
            <li><a class="nav-item btn contact text-light fs-5 py-2 m-5 mt-3"> <i class="fa fa-phone">&nbsp; 777(777)- 777</i></a>
            </li>
        </ul>
    </aside>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

              

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </div>
            </div>
        </nav>

      

      

     </div>
</div>
@extends('layouts.footer')
@section('footer')
@endsection

</html>
