@extends('admin.layout.dashboard')
@section('content')

<h1 class="text-center fs-3 text-white mb-5">  الرسائل التي تم الرد عليها  </h1>
<div class="container ">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(!isset($Messages[0]))

        <p class="fs-3 text-white text-center ">لايوجد رسائل </p>
        @else

        @foreach($Messages as $message)

        <div class=" text-white mb-4 col-12 col-md-8  shadow p-4 pb-0 mx-auto"  style="border:1px solid gray ;">
            <div class="d-flex justify-content-between ">
                <div>
                    <p class="yellow fs-5 my-0"><span>{{$message->email}}</span>> {{$message->name}}> </p>
                    <span class="yellow fs-5 my-0">الهاتف: {{$message->phone}}</span>
                </div>
                <p class="yellow fs-5 my-0">Time: {{$message->created_at}}</p>
            </div>
            <hr>
            <p class="my-4">{{$message->message}}</p>
        </div>
    @endforeach
    @endif
</div>
@endsection
                
