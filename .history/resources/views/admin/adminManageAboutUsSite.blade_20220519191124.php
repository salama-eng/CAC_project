@extends('admin.layout.dashboard')
@section('content')

<!-- start Page Content -->
@if($do == 'Manage')

<h1 class="text-center fs-3 text-white mb-5">ادارة صفحة من نحن  </h1>
    <div class="container col-md-10 col-11">
    <!-- start Message Content -->
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
    <!-- Ens Message Content -->

        @if(!isset($Content[0]))
        <a href="manage_about_us?do=Add" class="btn p-2 contact">
            <i class="fa fa-plus"></i>  النص الافتراضي
        </a>
        @endif

        @foreach($Content as $content)
        
        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4 site-manage"  style="border:1px solid gray ;">
            <h4 class="yellow ">نبذه عامة</h4>
            <hr>
            <p class="my-4">{{$content->description}}</p>
            <a href="manage_about_us?do=Edit&contentid={{$content->id}}&column=description&name=الوصف" class="edit p-1 mx-2">
                <i class='fa fa-edit'></i>
                تعديل 
            </a>
        </div>

        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4 site-manage" style="border:1px solid gray ;">
            <h4 class="yellow "> النص الاول</h4>
            <hr>
            <p>{{$content->paragraph_one}}</p>
            <a href="manage_about_us?do=Edit&contentid={{$content->id}}&column=paragraph_one&name=النص الاول" class="edit p-1 mx-2">
                <i class='fa fa-edit'></i>
                تعديل 
            </a>
        </div>

        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4 site-manage" style="border:1px solid gray ;">
            <h4 class="yellow "> النص الثاني</h4>
            <hr>
            <p>{{$content->paragraph_two}}</p>
            <a href="manage_about_us?do=Edit&contentid={{$content->id}}&column=paragraph_two&name=النص الثاني" class="edit p-1 mx-2">
                <i class='fa fa-edit'></i>
                تعديل 
            </a>
        </div>
        @endforeach
    </div>
<!-- End page Content -->

    @elseif($do == 'Add')
<!-- start add model -->
<h1 class="text-center fs-3 mb-5">اضافة النص الافتراضي</h1>
<div class="container col-lg-8 col-11">
    @if(session()->has('error'))
        <div class="alert message">
            {{ session()->get('error') }}
        </div>
    @endif
    <form action="{{ route('add_about_us_content') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Start content -->
                <div class="mb-3 row site-manage">
                    <label class="col-sm-2 col-form-label text-white">  نبذة عامة </label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="description" cols="30" class="form-control mt-4 mb-0"  rows="7">
                           الاس، تكساس، تعد كوبارت الشركة الرائدة على مستوى العالم في مزادات السيارات على الإنترنت، ووجهة رئيسية لإعادة بيع وإعادة تسويق السيارات. تقنية كوبارت المبتكرة ومنصة المزادات على الإنترنت تربط بين البائعين و لمشترين حول العالم. كوبارت تقوم بتشغيل أكثر من 200 موقع في 11 بلد، وأكثر من 150,000 سيارة للمزاد كل يوم.                        </textarea>
                        @error('description')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row site-manage">
                    <label class="col-sm-2 col-form-label text-white">  النص الاول </label>
                    <div class="col-sm-8 col-md-9">   
                    <textarea name="paragraph_one" cols="30" class="form-control mt-4 mb-0"  rows="7">
                        تقنية المزاد على كاك مزاد المنصة المحركة لمزادات السيارات عبر الانترنت
                        </textarea>
                        @error('paragraph_one')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row site-manage">
                    <label class="col-sm-2 col-form-label text-white">  النص الثاني </label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="paragraph_two" cols="30" class="form-control mt-4 mb-0"  rows="7">
                        مع تطور تكنلوجيا مزتد السيارات على الانترنت , كاك مزاد تمكنك من البيع المباشر لسيلرتك او شراء اي سيارة بكل راحة ومن تامنزل او المكتب . على اجهزة الكمبيوتر او الأجهزةالمحمولة , انت تعرف بالفعل كيف التسجيل , تقديم ترخيص التجارة و تسجيل في المزاد
                        </textarea>
                        @error('paragraph_two')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End edit content -->

                <!-- Start Submit -->
                <div class="mb-2 row site-manage">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="  النص الافتراضي" class=" btn p-2 contact">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
</div>
<!-- End Add Content -->

@elseif($do == 'Edit')
<!-- start Edit content -->
{{$contentid = isset($_GET['contentid']) && is_numeric($_GET['contentid']) ? intval($_GET['contentid']) : 0;}}
{{$column = $_GET['column'];}}
{{$name = $_GET['name'];}}
<h1 class="text-center fs-3 mb-5">تعديل المحتوى</h1>
<div class="container col-lg-8 col-11">
    @if(session()->has('error'))
        <div class="alert alert-success message">
            {{ session()->get('error') }}
        </div>
    @endif
            <form action="{{ route('edit_content',$contentid) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="contentid" value="{{$contentid}}">
                <input type="hidden" name="column" value="{{$column}}">
                <!-- Start content -->
                <div class="mb-3 row site-manage">
                    <label class="col-sm-2 col-form-label text-white">  {{$name}}  </label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="{{$column}}" cols="30" class="form-control  mb-0"  rows="7">
                        {{$Content[0]->$column}}
                        </textarea>
                        <div class="text-end yellow">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li >* {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
                <!-- End edit content -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل  النص" class=" btn p-2 contact">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
</div>
@endif
@endsection
                
