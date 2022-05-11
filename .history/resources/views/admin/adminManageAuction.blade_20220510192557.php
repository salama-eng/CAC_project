@extends('admin.layout.dashboard')
@section('content')


<h1 class="text-center fs-3 text-white mb-5">ادارة  االمزادات الحالية </h1>
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
                    <td> اسم البايع</td>
                    <td>انتهاء وقت المزايدة</td>
                    <td>السعر الابتدائي  </td>
                    <td>المبلغ الذي وصل اليه </td>
                    <td>تفاصيل المزايدة </td>
                    <td>الحالة </td>

                </tr>
                @php $i = 1 @endphp

                @foreach($posts as $post )
                @foreach($post->auctions as $auction)
                @if ($auction->aw_user_id == Auth::id())
                
                @if($post->is_active == 1 && $post->end_date >= date('Y-m-d') && $post->status_auction == 0 )

              
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->end_date}}</td>
                            <td>{{$post->starting_price}}</td>
                            <td>{{$post->auctions->max('bid_total');}</td>
                            <td>
                                <a href="{{route('auctiondetails',$auction->post_id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                            </td>
                            <td>
                                <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeCategory">
                                    <i class='fa fa-check'></i> Active
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach

                <div class="modal fade user" id="activeCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="{{route('activeAuction')}}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                <input type="submit" class=" bg-yellow text-white fs-5" value=" تعديل الحالة  " />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </table>
        </div>
       
       
    </div>

@endsection
                
