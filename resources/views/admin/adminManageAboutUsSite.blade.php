@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3 text-white mb-5">ادارة صفحة من نحن  </h1>
    <div class="container ">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        @foreach($Content as $content)
        
        <div class=" text-white mb-4 col-12 col-md-10 shadow p-4 pb-0" style="border:1px solid gray ;">
            <h2 class="yellow ">نبذه عامة</h2>
            <hr>
            <p class="my-4">{{$content->description}}</p>
            <a href="manage_about_us?do=Edit&contentid={{$content->id}}&column=description&name=الوصف" class="btn btn-success">
                <i class='fa fa-edit'></i> تعديل
            </a>
        </div>

        <div class=" text-white mb-4 col-12 col-md-10 shadow p-4 pb-0" style="border:1px solid gray ;">
            <h2 class="yellow "> النص الاول</h2>
            <hr>
            <p>{{$content->paragraph_one}}</p>
            <a href="manage_about_us?do=Edit&contentid={{$content->id}}&column=paragraph_one&name=النص الاول" class="btn btn-success">
                <i class='fa fa-edit'></i> تعديل
            </a>
        </div>

        <div class=" text-white mb-4 col-12 col-md-10 shadow p-4 pb-0" style="border:1px solid gray ;">
            <h2 class="yellow "> النص الثاني</h2>
            <hr>
            <p>{{$content->paragraph_two}}</p>
            <a href="manage_about_us?do=Edit&contentid={{$content->id}}&column=paragraph_two&name=النص الثاني" class="btn btn-success">
                <i class='fa fa-edit'></i> تعديل
            </a>
        </div>



                @endforeach
       
       
    </div>
@elseif($do == 'Edit')
<!-- start Edit content -->
{{$contentid = isset($_GET['contentid']) && is_numeric($_GET['contentid']) ? intval($_GET['contentid']) : 0;}}
{{$column = $_GET['column'];}}
{{$name = $_GET['name'];}}
<h1 class="text-center">Edit Content</h1>
<div class="container col-lg-8 col-11">
    @if ($errors->any())
        <div class="alert message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li >{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <form action="{{ route('edit_content',$contentid) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="contentid" value="{{$contentid}}">
                <input type="hidden" name="column" value="{{$column}}">
                <!-- Start content -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">  {{$name}}  </label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="{{$column}}" cols="30" class="form-control"  rows="7">
                        {{$Content[0]->$column}}
                        </textarea>
                    </div>
                </div>
                <!-- End edit content -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل  النص" class=" btn bg-yellow ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
</div>
@endif
@endsection
                
