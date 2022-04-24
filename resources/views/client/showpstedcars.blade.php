@extends('client.layout.clientdashboard')
@section('content')


<h3 class="text-warning  mt-5 mb-5 text-center">السيارات المضافة في المزاد</h3>

<section class="card-container  d-flex flex-wrap justify-content-between ">
    @foreach($users->posts as $post)
        @if($post->is_active == 1 && $post->end_date >= date('Y-m-d'))
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
  
</section>

@endsection