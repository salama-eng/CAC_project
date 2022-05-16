
@extends('front.layout.home')

@section('content')<hr class=" d-block h-100 my-5 w-100">
<h3 class="mt-5 m-auto active">عذرا لايمكنك الوصول!!!</h3>
<div class="col-12 d-flex justify-content-center ">

<img src="{{ URL::asset('assets/images/403.png') }}" alt="" class="w-50 m-auto" ></div>

@endsection