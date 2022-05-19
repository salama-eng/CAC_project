@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5"> ادارة العروض </h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="table-responsive text-white">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr class="active">
                    <th>#ID</th>
                    <th>السيارة </th>
                    <th> اسم المستخدم</th>
                    <th>انتهاء وقت المزايدة</th>
                    <th>السعر الابتدائي  </th>
                    <th>تفاصيل المزايدة </th>
                    <th>تفعيل </th>

                </tr>
                @php $i = 1 @endphp
                @foreach($postsAll as $post)
                    @if($post->end_date >= date('Y-m-d'))
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->users->name}}</td>
                            <td>{{$post->end_date}}</td>
                            <td>{{$post->starting_price}}</td>
                            <td>
                                <a href="{{route('auctiondetails',$post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                            </td>
                            <td class="d-flex justify-content-center align-items-center">
                     
                    
                                {{-- <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deletePayment{{$Payment->id}}">
                                    <i class='fa fa-close'></i> Delete
                                </a> --}}
                                @if($post->is_active == 1)
                                   
                                    <label class="switch" data-bs-toggle="modal" data-bs-target="#active{{$post->id}}">
                                        <input type="checkbox" checked>
                                        <span class="slider"></span>
                                      </label>
                                @else
                                
                                    <label class="switch" data-bs-toggle="modal" data-bs-target="#active{{$post->id}}">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                      </label>
                                @endif
                                
                            </td>
                        </tr>
                        <div class="modal fade user" id="active{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">
                                    <form action="unactive" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"> تعديل حالة المزاد</h5>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2>هل انت متاكد</h2>
                                            <input type="hidden" name="postid" value="{{$post->id}}">
                                            <input type="hidden" name="userid" value="{{$post->users->id}}">
                                            <input type="hidden" name="is_active" value="{{$post->is_active}}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                            <input type="submit" class=" bg-yellow text-white fs-5" value=" تاكيد   " />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach
               
            </table>
        </div>
       
       
    </div>

@endsection