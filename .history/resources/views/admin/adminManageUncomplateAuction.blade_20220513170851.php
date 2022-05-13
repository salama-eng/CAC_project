@extends('admin.layout.dashboard')
@section('content')

<h1 class="text-center fs-3 text-white mb-5">  االمزادات المعلقة </h1>
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
                    <td>اسم المشتري </td>
                    <td>المبلغ</td>
                    <td>الاجمالي</td>
                    <td>تاريخ الانتهاء</td>
                    <td>تفاصيل المزايدة </td>
                    <td> الحالة </td>
                    <td> الدفع </td>
                    <td> الاستلام </td>
                
                </tr>
               
                @foreach ($posts as $post)
                    
                        @if($post->is_active == 1 && $post->status_auction == 0 && $post->end_date < date('Y-m-d'))

                     @foreach ($post->auctions as $auction)
                         @if ($auction->bid_total == $auction->max('bid_total') )
                       

                        <tr>

                            <td></td>
                            <td>{{$post->name}}</td>                         
                            <td>{{$auction->userOwner->name}}</td>
                            <td>{{$auction->userAw->name}}</td>
                            <td>{{$auction->bid_total}}</td>
                            <td>
                            
                            </td>
                          
                            <td>{{$post->end_date}}</td>
                            <td>
                                <a href="{{route('auctiondetails',$post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                            </td>
                          
                            <td>   @if ($auction->admin_confirm==0)
                                <a href="" class='btn activate accept' data-bs-toggle="modal" style="" data-bs-target="#active{{$post->id}}">
                                    <i class='fa fa-check'></i> موافقة
                                </a>
                                 @else
                                 <p class='btn active'>
                                    <i class='fa fa-check'></i> تمت الموافقة
                                </p>
                            @endif
                            </td>

                            <td>   @if ($auction->payment_confirm==0)
                                <p class="text-red">
                                    <i class='fa fa-x-circle'></i>لم يتم الدفع
                                </p>
                                 @else
                                 <p class="text-green">
                                    <i class='fa fa-check'></i> تم الدفع 
                                </p>
                            @endif
                            </td>
                            <td>   @if ($auction->user_confirm==0)
                                <p class="text-red">
                                    <i class='fa fa-x-circle'></i>لم يتم الاستلام
                                </p>
                                 @else
                                 <p class="text-green">
                                    <i class='fa fa-check'></i> تم الاستلام 
                                </p>
                            @endif
                            </td>
                        </tr>



                        
                         @endif
                     @endforeach
                      
                         
                        @endif
                    
              


                    <div class="modal fade user" id="active{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        {{-- <div class="modal-dialog">
                            <div class="modal-content bg-dark">
                                <form action="accept" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">قبول عملية المزايدة </h5>
                                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2>هل انت متاكد</h2>
                                        <input type="hidden" name="auction_id" value="{{$auction_id}}">
                                        <input type="hidden" name="userid" value="{{$post->users->id}}">
                                        <input type="hidden" name="admin_confirm" value="{{$admin_confirm}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                        <input type="submit" class=" bg-yellow text-white fs-5" value=" موافقة   " />
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                    </div>



                @endforeach
            </table>
                
    
        </div>
    </div>



@endsection