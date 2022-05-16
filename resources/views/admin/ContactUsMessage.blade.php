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
                <div>
                    <p class="yellow fs-5 my-0"><span>{{$message->email}}</span>> {{$message->name}}> </p>
                    <span class="yellow fs-5 my-0">الهاتف: {{$message->phone}}</span>
                </div>
                <p class="yellow fs-5 my-0">Time: {{$message->created_at}}</p>
            </div>
            <hr>
            <p class="my-4">{{$message->message}}</p>
            <hr>
            <div class="email">
                {!!$i = 0!!}
                @foreach($replays as $replay)
                @if($replay->getFrom()[0]->mail == $message->email)

                @if(++$i === count($replays))
                <p class="yellow">* هناك رسائل لم يتم الاطلاع عليها عن طريق الايميل</p>

                <p>{{$replay->getSubject()}}</p>
                {!!$replay->getHTMLBody()!!}
                <hr>
                @endif
                @endif
                @endforeach
            </div>
            <a href="manage_message?do=Edit&messageid={{$message->id}}" class="btn p-2 contact">
                <i class='fa fa-envelope'></i> ارسال ايميل
            </a>
            <a href="" class='edit btn p-1 mx-2' data-bs-toggle="modal" data-bs-target="#activePayment{{$message->id}}">
                 تم الرد عليها<i class="fa fa-long-arrow-left p-2 pt-2"></i> 
            </a>
        </div>
        <div class="modal fade user" id="activePayment{{$message->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="{{route('statusMessage')}}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title " id="exampleModalLabel">تم الرد عليها</h5>
                                    <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="Messageid" value="{{$message->id}}">
                                    <h5 class="text-white">هل انت متاكد انك تريد نقل الرسالة للرسائل التي تم الرد عليها </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class=" bg-yellow text-white fs-5" value=" نقل الرسالة   " />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    @endforeach
    @endif
</div>


@elseif($do == 'Edit')
<!-- start Edit model -->
{{$messageid = isset($_GET['messageid']) && is_numeric($_GET['messageid']) ? intval($_GET['messageid']) : 0;}}
<h1 class="text-center">ارسال رد للرسالة</h1>
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
                        <input type="submit" value="   ارسال الرد" class=" btn p-2 contact ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                
