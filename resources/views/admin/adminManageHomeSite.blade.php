@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5">ادارة الصفحة الرئيسية  </h1>
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
                    <td>الوصف </td>
                    <td>  النص الاول </td>
                    <td>  النص الثاني </td>
                    <td> تعديل  </td>
                </tr>
            </table>
        </div>
       
       
    </div>

@endsection
                
