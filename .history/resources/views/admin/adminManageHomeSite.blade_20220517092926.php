@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3 text-white mb-5">ادارة الصفحة الرئيسية  </h1>
    <div class="container col-md-10 col-11">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(!isset($Content[0]))

        <a href="manage_home?do=Add" class="btn btn-sm bg-yellow">
            <i class="fa fa-plus"></i>  النص الافتراضي
        </a>
        @endif

        @foreach($Content as $content)

        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4" style="border:1px solid gray ;">
            <h4 class="yellow ">النص الرئيسي</h4>
            <hr>
            <p class="my-4">{{$content->main_paragraph}}</p>

            <a href="manage_home?do=Edit&contentid={{$content->id}}&column=main_paragraph&name=النص الرئيسي" class="edit p-1 mx-2">
                            <i class='fa fa-edit'></i>
                            تعديل 
                        </a>
        </div>
        
        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4" style="border:1px solid gray ;">
            <h2 class="yellow ">الوصف</h2>
            <hr>
            <p class="my-4">{{$content->description}}</p>

            <a href="manage_home?do=Edit&contentid={{$content->id}}&column=description&name=الوصف" class="edit p-1 mx-2">
                <i class='fa fa-edit'></i>
                تعديل 
            </a>
        </div>

        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4" style="border:1px solid gray ;">
            <h2 class="yellow "> النص الاول</h2>
            <hr>
            <p>{{$content->paragraph_one}}</p>
            <a href="manage_home?do=Edit&contentid={{$content->id}}&column=paragraph_one&name=النص الاول" class="edit p-1 mx-2">
                <i class='fa fa-edit'></i>
                تعديل 
            </a>
        </div>

        <div class=" text-white mb-4 col-12 col-md-10 m-auto shadow p-4 pb-4" style="border:1px solid gray ;">
            <h2 class="yellow "> النص الثاني</h2>
            <hr>
            <p>{{$content->paragraph_two}}</p>
            <a href="manage_home?do=Edit&contentid={{$content->id}}&column=paragraph_two&name=النص الثاني" class="edit p-1 mx-2">
                <i class='fa fa-edit'></i>
                تعديل 
            </a>
        </div>



    @endforeach
       
       
    </div>
@elseif($do == 'Add')
<!-- start add model -->
<h1 class="text-center fs-3 mb-5">اضافة المحتوى الافتراضي</h1>
<div class="container">
    @if ($errors->any())
        <!-- <div class="alert message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> -->
    @endif
    <form action="{{ route('add_content') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Start content -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white mt-4">  النص الرئيسي </label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="main_paragraph" cols="30" class="form-control mt-4 mb-0"  rows="5">
                        لجميع السيارات والشاحنات المستعملة والجديدة
                        </textarea>
                        @if (session()->has('password'))
                        <p class="text-end yellow">{{ session()->get('main_paragraph') }}</p>
                        @endif
                        @error('main_paragraph')
                        <span class="text-end yellow">* {{ $error }}  </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white mt-4"> الوصف</label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="description" cols="30" class="form-control mt-4 mb-0"  rows="5">
                        تجعل من السهل على الاعضاء العثور والمزايدة على جميع السيارات
                        </textarea>
                        @error('description')
                        <span class="text-end yellow">* {{ $error }}  </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white mt-4"> النص الاول</label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="paragraph_one" cols="30" class="form-control mt-4 mb-0"  rows="5">
                        تقنية المزاد على كاك مزاد المنصة المحركة لمزادات السيارات عبر الانترنت
                        </textarea>
                        @error('paragraph_one')
                        <span class="text-end yellow">* {{ $error }}  </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white mt-4"> النص الثاني</label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="paragraph_two" cols="30" class="form-control mt-4 mb-0"  rows="5">
                        مع تطور تكنلوجيا مزتد السيارات على الانترنت , كاك مزاد تمكنك من البيع المباشر لسيلرتك او شراء اي سيارة بكل راحة ومن تامنزل او المكتب . على اجهزة الكمبيوتر او الأجهزةالمحمولة , انت تعرف بالفعل كيف التسجيل , تقديم ترخيص التجارة و تسجيل في المزاد
                        </textarea>
                        @error('paragraph_two')
                        <span class="text-end yellow">* {{ $error }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End edit content -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="  النص الافتراضي" class=" btn bg-yellow ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
</div>

@elseif($do == 'Edit')
<!-- start Edit content -->
{{$contentid = isset($_GET['contentid']) && is_numeric($_GET['contentid']) ? intval($_GET['contentid']) : 0;}}
{{$column = $_GET['column'];}}
{{$name = $_GET['name'];}}
<h1 class="text-center fs-3 mb-5">تعديل المحتوى</h1>
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
            <form action="{{ route('edit_home_content',$contentid) }}"  method="POST" enctype="multipart/form-data">
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
                    <div class="offset-sm-2 col-sm-10 ">
                        <input type="submit" value="تعديل  النص" class=" btn bg-yellow p-2">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
</div>
@endif
@endsection
                
