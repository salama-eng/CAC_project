@extends('admin.layout.dashboard')
@section('content')

<h1 class="text-center fs-3  text-white mt-4"> ادارة المزادات غير مكتملة الدفع </h1>
<div class="col-lg-4 col-8 mx-auto mb-5 mt-0">
    <span class="fa fa-search text-light"></span>
    <input type="text" placeholder="ابحث عن السيارة" class="search-input w-100 px-5 text-light">
</div>
    <div class="container">
         @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="table-responsive text-white ms-5">
<style>
    .td  {
    border: none !important;
    padding:1.2rem;
    background-color:rgb(57, 56, 56) !important;
    color: var(--yellow !important)
   
}
</style>
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr class="active">
                    <td class="td">#ID</td>
                    <td class="u-name">السيارة </td>
                    <td class="td">اسم البائع </td>
                    <td class="td">اسم المشتري </td>
                  
                    <td class="td">المبلغ</td>
                    <td class="td">تاريخ الانتهاء</td>
                    <td class="td">تفاصيل المزايدة </td>
                    <td class="td"> الحالة </td>
                    <td class="td"> الدفع </td>
                    <td class="td"> الاستلام </td>
                    <td class="td"> ارسال المبلغ </td>
                
                </tr>
                @php $i = 1 @endphp
                @php $total= 0 @endphp
                @php $user_id= '' @endphp
                @php $user_name= '' @endphp
                @php $bid_amount= '' @endphp
                @php $auction_id= '' @endphp
                @php $user= '' @endphp
                @php $admin_confirm= '' @endphp
                
                @foreach ($posts as $post)
                    
                    @if (isset($post->auctions[0]->post_id))
                        @if($post->is_active == 1 && $post->status_auction == 0 && $post->end_date < date('Y-m-d') && $post->auctions->max('bid_amount'))
                        @foreach($post->auctions as $bid_total)
                            @if($bid_total->post_id == $post->id && $bid_total->bid_amount == $post->auctions->max('bid_amount'))
                                @php $user_id = $bid_total->userAw->id @endphp
                                @php $user_name = $bid_total->userAw->name @endphp
                                @php $buyer = $bid_total->userAw->id @endphp
                                @php $bid_amount = $bid_total->bid_amount @endphp
                                @php $auction_id = $bid_total->id @endphp
                                @php $bid_tot = $bid_total->bid_total @endphp

                                @php $admin_confirm = $bid_total->admin_confirm @endphp
                                @php $user_confirm = $bid_total->user_confirm @endphp
                                @php $payment_confirm = $bid_total->payment_confirm @endphp
                                @php $user = $bid_total->aw_user_id @endphp
                            @endif
                          
                            @endforeach
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$post->name}}</td>                         
                                <td>{{$post->users->name}}</td>
                                <td>{{$user_name}}</td>
                                <td>{{$bid_tot}}</td>
                               
                              
                                <td>{{$post->end_date}}</td>
                                <td>
                                    <a href="{{route('auctiondetails',$post->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                                </td>
                              
                                <td>   @if ($admin_confirm==0)
                                    <a href="" class='btn activate accept' data-bs-toggle="modal" style="" data-bs-target="#active{{$post->id}}">
                                        <i class='fa fa-check'></i> موافقة
                                    </a>
                                     @else
                                     <p class='btn green'>
                                        <i class='fa fa-check'></i> تمت الموافقة
                                    </p>
                                @endif
                                </td>

                                <td>   @if ($payment_confirm==0)
                                    <p class="text-red">
                                        <i class='fa fa-x-circle'></i>لم يتم الدفع
                                    </p>
                                     @else
                                     <p class="text-green">
                                        <i class='fa fa-check'></i> تم الدفع 
                                    </p>
                                @endif
                                </td>
                                <td>   @if ($user_confirm==0)
                                    <p class="text-red">
                                        <i class='fa fa-x-circle'></i>لم يتم الاستلام
                                    </p>
                                     @else
                                     <p class="text-green">
                                        <i class='fa fa-check'></i> تم الاستلام 
                                    </p>
                                @endif
                                </td>
                                <td>   @if ($payment_confirm==0)
                                    <p class="text-red">
                                        <i class='fa fa-x-circle'></i> لم يتم الدفع  
                                    </p>
                                     @else
                                     <a href="" class='btn activate accept' data-bs-toggle="modal" style="" data-bs-target="#send{{$post->id}}">
                                        <i class='fa fa-check'></i> تحويل المبلغ
                                    </a>
                                @endif
                                </td>
                            </tr>
                       
                    
                    @php $total = 0 @endphp
                    <div class="modal fade user" id="send{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content bg-dark">
                                <form action="admin_orders" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> ارسال المبلغ للبائع </h5>
                                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;"></button>
                                    </div>
                                   @php
                                   $admin_ratio=$bid_tot *5/100;
                                   $order_price=$bid_tot - $admin_ratio;
                                   @endphp
                                    <div class="modal-body">
                                        <h4> هل انت متاكد!!  </h4>
                                        <p> سيتم تحويل مبلغ قدرة  <em class="active">{{$order_price}}$</em></p>
                                        <p>   وسيتم خصم نسبة الموقع والتي تقدر ب  <em class="active">{{$admin_ratio}}$</em> </p>
                                        
                                        <input type="hidden" name="userid" value="{{$post->users->id}}">
                                        <input type="hidden" name="buyer" value="{{$buyer}}">  
                                        
                                        <input type="hidden" name="admin_ratio" value="{{$admin_ratio}}">
                                        <input type="hidden" name="order_price" value="{{$order_price}}">

                                        <input type="hidden" name="admin_confirm" value="{{$admin_confirm}}">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                        <input type="submit" class=" bg-yellow text-white fs-5" value=" موافقة   " />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
 @endif
                    <div class="modal fade user" id="active{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
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
                                        <input type="hidden" name="user" value="{{$user}}">

                                        <input type="hidden" name="admin_confirm" value="{{$admin_confirm}}">
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                        <input type="submit" class=" bg-yellow text-white fs-5" value=" موافقة   " />
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