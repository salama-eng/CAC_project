@extends('front.layout.home')
@section('content')



<main class=" main-contact1 d-flex justify-content-center align-items-center mt-5 ">
    <div class="overlay"></div>
    <div class="text container contactheader text-center">
        @if (session()->has('success'))
        <p class="message fs-5">{{ session()->get('success') }}</p>
        @endif
        <h1 class="mt-5   mb-5  yellow fw-bold "> <i class="bi bi-send"></i> تواصل معنا </h1>
        <p class="col-8  m-auto mb-5"> نحن نعمل باستمرار لجعل تجربتك من خلال الخدمات أسهل, سنقوم بالرد على رسالتكم خلال 24 ساعة
        </p>
        
    </div> 
</main>


    <section class="social text-center my-5">
        <h3 class="yellow">تواصل معنا عبر</h3>
        <div class="container my-5 d-flex  col-12 ">
            <div class="box  col-3   col-md-4">
                <i class="fa fa-location-arrow yellow my-4 fs-1  "></i>
                <h5 class="my-3">العنوان</h5>
                @foreach($Information as $information)
                @if($information->name ==  "العنوان")
                <span> {{$information->link}}</span>
                @endif
                @endforeach
            </div>

            <div class="box  col-6  col-md-4">
                <i class="fa fa-envelope yellow my-4 fs-1"></i>
                <h5 class="my-3">بريد الكتروني</h5>
                @foreach($Information as $information)
                @if($information->name == "بريد الكتروني")
                <span> {{$information->link}}</span>
                @endif
                @endforeach
            </div>
            <div class="box col-3   col-md-4">
                <i class="fa fa-mobile yellow my-4 fs-1"></i>
                <h5 class="my-3">تلفون</h5>
                @foreach($Information as $information)
                @if($information->name ==  "تلفون")
                <span> {{$information->link}}</span>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <section class="send_message  position-relative mb-5 pb-2">
        <div class="boxes d-flex container flex-wrap my-5 align-items-center">
            <div class="box col-12 col-md-7 order-2 order-md-1 col-lg-6">
                <h5 class="yellow my-3 p-3 fs-3 ">ارسال رسالة</h5>
                
                 <form action=" {{route('message')}}" method="POST" enctype="multipart/form-data" class="d-flex flex-wrap m-2">
                    @csrf
                    <div class="group col-11 col-md-6  ">
                        <input type="text" name="name" placeholder="الاسم" value="{{old('name')}}" id="" class=" my-1 col-11">
                        @error('name')
                        </br>
                        <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                        <input type="text" name="email" id="" value="{{old('email')}}" placeholder="عنوان البريد الالكتروني" class=" my-1 col-11">
                        @error('email')
                        </br>
                        <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                        <input type="text" name="phone" id="" value="{{old('phone')}}" placeholder="رقم التلفون" class=" my-1 col-11 ">
                        @error('phone')
                        </br>
                        <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror

                    </div>
                    <div class="group col-11 col-md-6 ">
                        <textarea name="message" id="" cols="30" rows="3" placeholder="نص الرسالة" class="col-11 my-3 my-md-1 ">{{old('message')}}</textarea>
                        @error('message')
                        </br>
                        <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                        <button type="submit" name="" class="col-11">ارسال </button>
                    </div>
                </form>
            </div>
            <div
                class="box  position-relative col-12 d-flex justify-content-center col-md-5 col-lg-6 align-items-center order-1 order-md-2">

                <img src="{{ URL::asset('images/map.png') }}" class=" shadow col-11 z-1 " alt="">

            </div>

        </div>
        <div class="yellow_box d-none d-md-block top-0 h-110 z-0 bg-yellow z-8 mb-5"></div>


    </section>
@endsection
