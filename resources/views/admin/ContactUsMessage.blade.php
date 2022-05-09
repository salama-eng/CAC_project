@extends('admin.layout.dashboard')
@section('content')
@if($do == 'Manage')

<h1 class="text-center fs-3 text-white mb-5">  الرسائل التي لم يرد عليها  </h1>
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
                <p class="yellow fs-5 my-0">{{$message->name}}</p>
                <p class="yellow fs-5 my-0">Time: {{$message->created_at}}</p>
            </div>
            <hr>
            <p class="my-4">{{$message->message}}</p>
            <hr>
            <a href="manage_message?do=Edit&messageid={{$message->id}}" class="btn btn-success">
                <i class='fa fa-envelope'></i> ارسال رد
            </a>
        </div>
    @endforeach
    @endif
</div>


@elseif($do == 'Edit')
<!-- start Edit model -->
{{$messageid = isset($_GET['messageid']) && is_numeric($_GET['messageid']) ? intval($_GET['messageid']) : 0;}}
<h1 class="text-center">Send Message</h1>
<div class="container col-12 col-md-8">
    @if ($errors->any())
        <div class="alert message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($Messages as $message)
        @if($message->id == $messageid)
        <div class=" text-white mb-4 col-12   shadow p-4 pb-0 "  style="border:1px solid gray ;">
            <div class="d-flex justify-content-between ">
                <p class="yellow fs-5 my-0">{{$message->name}}</p>
                <p class="yellow fs-5 my-0">Time: {{$message->created_at}}</p>
            </div>
            <hr>
            <p class="my-4">{{$message->message}}</p>
        </div>
        <form action="{{ route('send_message',$messageid) }}"  method="POST" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="messageid" value="{{$messageid}}">
                <!-- Start message -->
                    <div class=" text-white mb-4 col-12   pb-0"  >
                        <label for="">ادخل نص الرسالة هنا</label>
                        <textarea name="send_message" style="border:1px solid gray ;" class="form-control mx-0 text-white  col-12 p-1 "  rows="7">
                        </textarea>
                        @if (session()->has('password'))
                        <p class="text-end yellow">{{ session()->get('main_paragraph') }}</p>
                        @endif
                    </div>

            
                <!-- End message -->
                <!-- Start Submit -->
                <div class="mb-2 col-12 col-md-2 ">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="   ارسال الرد" class=" btn bg-yellow ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                
