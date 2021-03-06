@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5">ادارة  طلبات المزاد </h1>
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
                    <td> اسم المستخدم</td>
                    <td>انتهاء وقت المزايدة</td>
                    <td>السعر الابتدائي  </td>
                    <td>  صورة السيارة  </td>
                    <td>تفاصيل السيارة </td>
                    <td>التحكم </td>

                </tr>
              
                @foreach($postsAll as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->users->name}} </td>
                    <td>{{$post->end_date}} </td>
                    <td>{{$post->starting_price}} </td>
                    <td>4400</td>
                    <td>رابط صفحة المزايدة</td>
                    <td>   
                        <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeCategory">
                            <i class='fa fa-close'></i> noActive
                        </a> 
                    </td>
                </tr>
                @endforeach
                <div class="modal fade user" id="activeCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="تعديل الحالة" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </table>
        </div>
       
       
    </div>

@endsection
                