
@extends('front.layout.home')
@section('content')

 
    </div>
    <section class="d-flex container mt-5 flex-wrap col-lg-9">
        <section class="col-12  col-lg-6 mt-5">
            <div class="mt-5">
                <div class="col-12">
                    <a href="" class="d-flex card-details fs-6"><p class="fa fa-long-arrow-right pt-2 px-2"></p>رجوع</a>
                    <h3 class="text-light fw-bold mt-2">{{$post->name}}</h3>
                    <h3 class="active my-3">
                        {{$post->starting_price}}$
                        <span class="card-details fs-6"> /السعر الحالي</span></h3>
                        @if (isset($post->auctions[0]->bid_total))
                        <h5 class="active my-1">
                            {{$post->auctions[0]->bid_total}}$
                            <span class="card-details fs-6"> /السعر الحالي</span></h5>
                            @else
                            <h3 class="active my-3 fs-7">
                                {{$post->starting_price}}$
                                <span class="card-details fs-7"> /السعر الاولي</span></h3>
                        @endif
                       
                </div>
                <div class="d-flex flex-wrap">
                    <div class="col-6 col-lg-4">
                    <p class="card-details mb-1 fw-bold">العنوان</p>
                    <p class="card-details mb-1 fw-bold">الموديل</p>
                    <p class="card-details mb-1 fw-bold">الماركة</p>
                    <p class="card-details mb-5 fw-bold">اللون</p>
                    <p class="card-details mb-1 fw-bold">المحرك</p>
                    <p class="card-details mb-1 fw-bold">الضرر</p>
                    <p class="card-details mb-1 fw-bold">حالة السيارة</p>
                    <p class="card-details mb-1 fw-bold">تاريخ انتهاء المزاد</p>
                    <p class="card-details mb-1 fw-bold">  الوصف</p>

                    </div>
                    <div class="col-6 col-lg-8">
                        <p class="mb-1 text-light ">{{$post->address}}</p>
                        <p class="mb-1 text-light ">{{$post->model->name}}</p>
                        <p class="mb-1 text-light ">{{$post->category->name}}</p>
                        <p class="mb-5 text-light ">{{$post->color}}</p>
                        <p class="mb-1 text-light ">{{$post->engin_car}}</p>
                        <p class="mb-1 text-light ">{{$post->damage}}</p>
                        <p class="mb-1 text-light ">{{$post->users->name}}</p>
                        <p class="mb-1 text-light ">{{$post->end_date}}</p>
                        <p class="mb-1 text-light "> {{$post->description}}</p>
                      
                    </div>
                    <button class=" contact text-light btn rounded-0 col-6 mt-4 ">
                        مزايدة
                    </button>
                </div>
            </div>
        </section>
        <section class="col-lg-6 col-sm-12 mt-5">
            <div id="carouselExampleControls" class="carousel slide col-12 mt-5" data-bs-ride="carousel">
                <div class="carousel-inner main-img-div w-100">
                    <div class="carousel-item active w-100">
                        <img src="/images/{{$post->image}}" class="d-block w-100 h-100 main-img" alt="{{$post->image}}">
            
                    </div>

                </div>

                <div class="col-lg-12 col-sm-12 d-flex flex-wrap justify-content-center">


                  @php
                      $images=json_decode($post->multiple_image,true);
       
                  @endphp
                   

                   @foreach ($images as $image)
                   <div class="img-responsive">
                    <img src="{{ URL::to('/images/'.$image)}}" class="img-fluid" alt="{{$image}}">
                </div>
                   @endforeach
                    <div class="img-responsive">
                        <img src="{{ URL::to('/images/'.$post->image) }}" class="img-fluid" alt="...">
                    </div>
                  
                    
                </div>

        </section>

    </section>

    @endsection