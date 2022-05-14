@extends('client.layout.clientdashboard')
@section('content')
    <h3 class="text-warning  mt-5 mb-5 text-center"> عمليات الشراء الغير مكتملة </h3>

    @if (session()->has('message'))
        <p class="alert alert-danger w-50 m-auto">{{ session()->get('message') }}</p>

@endif
<h3 class="text-warning  mt-5 mb-5 text-center">  عمليات الشراء الغير مكتملة </h3>

<section class="card-container  d-flex flex-wrap justify-content-between ">
    @if(session()->has('success'))
    <div class="alert alert-success message">
        {{ session()->get('success') }}
    </div>
@endif
 {{-- c --}}
    @php
    $i=0;
@endphp
 
   
@foreach($posts as $post )
@foreach($post->auctions as $auction)
@if ($auction->aw_user_id == Auth::id())
@if($post->is_active == 1 && $post->status_auction == 0  && $auction->admin_confirm == 1 && $post->end_date <= date('Y-m-d'))
@php
    $i++;
@endphp


<div class="card text-light m-auto my-4" style="width: 18rem;">
    <img src="{{ URL::asset('images/'.$post->image) }}" class="card-img-top p-3" height="220" alt="{{$post->image}}">
    <div class="card-body py-0">
        <h5 class="card-title text-center">{{$post->name}}</h5>
        <p class="text-center fs-7 card-details"> تنتهي في  <em> {{$post->end_date}} </em></p>
    </div>

    <div class="card-body d-flex justify-content-between py-0">
        <p href="#" class="card-link card-details fs-7">سعر المزايدة/<span class="active">{{$post->auctions->max('bid_total');}} $</span>
        </p>
        <a href="{{route('auctiondetails',$post->id)}}" class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
    
    <div class="card-body d-flex justify-content-between py-0">
                    
      
@if ($auction->user_confirm==0)
<a href="#" data-bs-toggle="modal" data-bs-target="#active{{$post->id}} "class="card-link card-details fs-7 bg-yellow p-1 px-3 m-1 card-btn text-white">تاكيد الاستلام </a>
@else
<p class="card-link card-details fs-7 p-1 px-3 m-1 card-btn text-white bg-green "><i class="fa fa-check"></i> تم الاستلام</p>
@endif
        
        <a href="#" class="card-link card-details fs-7 bg-yellow p-1 px-3 m-1 card-btn text-white" data-bs-toggle="modal" data-bs-target="#payment{{ $post->id }}"> ارسال المبلغ </a>
         </div>
         <a href="{{route('chat',$auction->id)}}" class="card-link active bg-darkgrey p-1 card-btn px-3 m-1 text-center w-75 m-auto my-2 fs-7"> الذهاب للدردشة  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
</div>

</div> 

<div class="modal fade user" id="active{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <form action="user_confirm" method="post">
                @csrf
                <div class="modal-header">
                    
                    <h5 class="modal-title" id="exampleModalLabel"> تاكيد الاستلام </h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-white fs-5">هل انت متاكد انك استلمت سيارة {{$post->name}}/ {{$post->model}}</h2>
                   <input type="hidden" name="auction_id" value="{{$auction->id}}">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                    <input type="submit" class=" bg-yellow text-white fs-5" value=" نعم  " />
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade user" id="payment{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark">
            <form action="{{route('testPayment')}}" method="get">
                @csrf
                <div class="modal-header">
                    
                    <h5 class="modal-title" id="exampleModalLabel"> ارسال المبلغ </h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close" style="color: white !important;"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-white fs-5">
                        @php $discount = 0.2 * $post->starting_price @endphp
                        @php $dis =  $post->auctions->max('bid_total') - $discount @endphp
                        مرحبا <span class="yellow">{{auth()->user()->name}}</span>
                        المبلغ الذي وصلت له السيارة هو <span class="yellow">{{$post->auctions->max('bid_total');}} $</span>

                        وسيتم خصم من حسابك <span class="yellow">{{$dis}} $</span> 
                        علما بانه قد تم سحب من حسابك مبلغ <span class="yellow">{{$discount}} $</span>
                         
                    </h2>
                   <input type="hidden" name="post_id" value="{{$post->id}}">
                   <input type="text" name="price" value="{{$dis}}">
                   <input type="hidden" name="user_id" value="{{$auction->aw_user_id}}">
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                    <input type="submit" class=" bg-yellow text-white fs-5" value=" نعم  " />
                </div>
            </form>
        </div>
    </div>
</div>

@endif

@endif
@endforeach  


@endforeach

    @if ($i <= 0)
    <div class="d-flex flex-wrap col-12 justify-content-center align-items-center text-center">
    
        <h6 class="col-12 "> عذرا لايوجد بيانات؟؟ </h6>
        
        <img class=" image-fluid m-auto col-8 col-lg-3  my-3" src="assets/images/nodata.png"  height=""alt="">
        <a href="{{route('addAuction')}}" class="card-link active text-center mt-5 mb-2 col-12">   اضافة مزاد  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
        
        
        </div> 
    @endif
   
    
    </section>
@endsection
