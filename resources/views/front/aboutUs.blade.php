@extends('front.layout.home')
@section('content')


<main class=" main-contact d-flex justify-content-center align-items-center mt-5 ">
    <div class="overlay"></div>
    <div class="text container aboutheader ">
        <h1 class="  yellow mb-5 fw-bold "> شركة مزاد كاك</h1>
        <p class=" col-lg-9 col-11 mb-5">{{$Content[0]->description}}</p>
        <a href="{{route('contact_us')}}" class=" border1 text-center mb-2 px-3 py-2 mt-5"> تواصل معنا  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
</main>

<div class="mt-5 col-7 col-lg-8 m-auto py-5">
    <h1 class=" yellow mt-4 text-center m-5 active fs-3">البراندات</h1>
    <div class="brands d-flex justify-content-around flex-wrap">

        @foreach($members as $member)

            <img class="img-fluid" src="{{ URL::asset('images/'.$member->image) }}" width="100" height="" alt="">

        @endforeach
        <!-- <img class="img-fluid" src="brand/5.png" width="100" height="" alt="">
        <img class="img-fluid" src="brand/3.png" width="100" height="" alt="">
        <img class="img-fluid" src="brand/4.png" width="100" height="" alt="">
        <img class="img-fluid" src="brand/1.png" width="100" height="" alt="">
        <img class="img-fluid" src="brand/5.png" width="100" height="" alt=""> -->



    </div>
</div>



<div class="about mt-5 mb-5 pt-3">
    <div class="d-flex  col-12 about1">

        <div class="col-12 col-lg-7 img-4-sec d-flex align-items-center justify-content-end">
            <div class="">
           
            </div>
                 
           
            <a href="" class="text-light p-2 px-4 d-none">من نحن
                <i class="fa fa-arrow-left"></i>
            </a>
            <p class="text-light ">{{$Content[0]->paragraph_one}}</p>
        </div>

    </div>

    <div class="d-flex col-12 about2">
        <div class=" d-flex align-items-center justify-content-end">
            <p class="col-4 p-5 text-light m-auto section-text"> {{$Content[0]->paragraph_two}}</p>
            <div class="img-4-sec2 col-6"><img src=""></div>
        </div>
    </div>

</div>



@endsection