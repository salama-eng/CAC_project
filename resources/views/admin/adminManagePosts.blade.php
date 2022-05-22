@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5">ادارة  طلبات المزاد </h1>
    <div class="container">
        @if(session()->has('error'))
            <div class="alert alert-danger message">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr class="active">
                    <th>#ID</th>
                    <th>السيارة </th>
                    <th> اسم المستخدم</th>
                    <th>انتهاء وقت المزايدة</th>
                    <th>السعر الابتدائي  </th>
                    <th>تفاصيل المزايدة </th>
                    <th>الحالة </th>

                </tr>
                @php $i = 1 @endphp
                @foreach($postsAll as $post)
                    @if($post->is_active == 0)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->users->name}}</td>
                            <td>{{$post->end_date}}</td>
                            <td>{{$post->starting_price}}</td>
                            <td>
                                <a href="{{route('auctiondetails',$post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                            </td>
                            <td>   
                                <a href="" class='btn activate accept' data-bs-toggle="modal" style="" data-bs-target="#active{{$post->id}}">
                                    <i class='fa fa-check'></i> قبول
                                </a> 
                            </td>
                        </tr>
                    @endif
                
                    <div class="modal fade user" id="active{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark">
                                <form action="active" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">قبول المزاد</h5>
                                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>هل انت متاكد</h2>
                                        <input type="hidden" name="postid" value="{{$post->id}}">
                                        <input type="hidden" name="userid" value="{{$post->users->id}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                        <input type="submit" class=" bg-yellow text-white fs-5" value=" قبول   " />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
        </div>
       
       
    </div>

@endsection