@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5">  االمزادات المنتهية </h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="table-responsive text-white">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td>#ID</td>
                    <td>السيارة </td>
                    <td>اسم البائع </td>
                    <td>اسم المشتري</td>
                    <td>المبلغ</td>
                    <td>تاريخ الانتهاء</td>

                </tr>
                <?php $i = 1 ?>
  
                <tr>
                    <td>{{$i++}}</td>
                    <td> السيارة</td>
                    <td>اسم البائع </td>
                    <td>اسم المشتري</td>
                    <td>المبلغ</td>
                    <td>تاريخ الانتهاء</td>


                </tr>
            </table>
        </div>
       
       
    </div>

@endsection
                