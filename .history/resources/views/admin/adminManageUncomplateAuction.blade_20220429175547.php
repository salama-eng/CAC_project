@extends('admin.layout.dashboard')
@section('content')

<h1 class="text-center fs-3 text-white mb-5">  االمزادات المعلقة </h1>
    <div class="container">
        <div class="table-responsive text-white">
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
                @php $i = 1 @endphp
                @php $total= 0 @endphp
                
                @foreach ($posts as $post)
                    
                    @if (isset($post->auctions[0]->post_id))
                        @if($post->is_active == 1 && $post->status_auction == 0 && $post->end_date < date('Y-m-d'))
                        @foreach($post->auctions as $bid_total)
                            @if($bid_total->post_id == $post->id)
                                @php $total += $bid_total->bid_amount @endphp
                            @endif
                            @endforeach
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$post->name}}</td>                         
                                <td>{{$post->users->name}}</td>
                                <td> {{$auctions->userAw->name}}</td>
                                <td>{{$post->starting_price}}</td>
                                <td>
                                    {{$total + $post->starting_price}}
                                </td>
                                <td>{{$post->end_date}}</td>
                                <td>
                                    <a href="{{route('auctiondetails',$post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                                </td>
                                <td>
                                    <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeCategory">
                                        <i class='fa fa-check'></i> Active
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endif
                    @php $total = 0 @endphp
                @endforeach
            </table>
        </div>
    </div>
@endsection