@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5"> المزادات المنتهية لم يحصل لها مزايدة</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        
        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td>#ID</td>
                    <td>السيارة </td>
                    <td>اسم البائع </td>
                    <td>المبلغ</td>
                    <td>تاريخ الانتهاء</td>
                    <td>تفاصيل المزايدة </td>
                    <td>التحكم </td>
                </tr>
                
            </table>
        </div>
       
    </div>
<h1 class="text-center fs-3 text-white mb-5">  االمزادات المكتملة </h1>
    <div class="container">
        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td>#ID</td>
                    <td>السيارة </td>
                    <td>اسم البائع </td>
                    <td>اسم المشتري </td>
                    <td>المبلغ</td>
                    <td>الاجمالي</td>
                    <td>تاريخ الانتهاء</td>
                    <td>تفاصيل المزايدة </td>
                    <td>التحكم </td>
                </tr>
                {{-- @php $i = 1 @endphp
                @php $total= 0 @endphp
                 --}}

@foreach($orders as $order)
        @if($order->post->is_active == 1 && $order->post->status_auction == 1)

     
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$order->post->name}}</td>
                                <td>{{$post->users->name}}</td>
                                <td>{{$auction->userAw->name}}</td>
                                <td>{{$post->starting_price}}</td>
                                <td>
                                    {{$total + $post->starting_price}}
                                </td>
                                <td>{{$post->end_date}}</td>
                                <td>
                                    <a href="{{route('auctiondetails',$post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                                </td>
                                <td>
                                    <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#active{{$post->id}}">
                                        <i class='fa fa-check'></i> ارسال اشعار
                                    </a>
                                </td>
                            </tr>

 @endif
                            @endforeach
                           
                            <div class="modal fade user" id="active{{$order->post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-dark">
                                        <form action="sendnotification" method="post">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">قبول المزاد</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>هل انت متاكد</h2>
                                                <input type="hidden" name="useraw" value="{{$auction->userAw->id}}">
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
                            @endif
                            @endforeach
                        @endif
                    @endif
                    @php $total = 0 @endphp
                @endforeach
            </table>
        </div>
       
    </div>
@endsection
                
