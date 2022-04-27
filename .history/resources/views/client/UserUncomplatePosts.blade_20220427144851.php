@extends('client.layout.clientdashboard')
@section('content')



<h3 class="text-warning  mt-5 mb-5 text-center">  عمليات البيع الغير مكتملة </h3>

<section class="card-container  d-flex flex-wrap justify-content-between ">

    @php
    $i=0;
@endphp
 
    @foreach($auctions as $auction)
    
        @if($auction->auction_post->is_active == 1 && $auction->auction_post->status_auction == 0 && $auction->auction_post->end_date < date('Y-m-d'))
        
        @php
    $i++;
@endphp


            <div class="card text-light m-auto" style="width: 18rem;">
                <img src="images/{{$post->image}}" class="card-img-top" height="220" alt="...">
                <div class="card-body  mt-4">
                    <h5 class="card-title text-center">{{$post->name}}</h5>
                    <p class="text-center fs-7 card-details"> تنتهي في  <em> {{$post->end_date}} </em></p>
                </div>
                <div class="card-body d-flex justify-content-between  p-0 ">
                    <p href="#" class="card-link card-details">سعر المزايدة/<span class="active">{{$post->starting_price}}$</span></p>
                    <a href="#" class="card-link active">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </div>
            </div>
        @endif
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