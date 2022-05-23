@extends('client.layout.clientdashboard')
@section('content')

@if(isset(Auth::user()->profile->avatar))
        <form class="container d-flex flex-column flex-lg-row fs-6 col-12 col-md-11 justify-content-between flex-wrap" action="save_post"
         method="POST" enctype="multipart/form-data" style="margin-top: -30px">
        @csrf
        @if (session()->has('message'))
            <p class="alert alert-danger">{{ session()->get('message') }}</p>
        @endif
        <!-- @if ($errors->any())
                    @foreach ($errors->all() as $err)
    -->
        <!-- <p class="alert alert-danger ">{{ $err }}</p> -->
        <!--
    @endforeach
                @endif -->
        <h5 class="w-100 text-warning mx-2 mb-4 "><i class="fa fa-plus p-2 fs-6"></i>إضافة مزاد</h5>
        <div class="mb-3 px-2 col-12 col-lg-6">
                <label for="" class="form-label  text-white fs-7 ">اسم السيارة</label>
            <div class="input-group ">
                <input type="text" value="{{ old('carname') }}" name="carname"
                    class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            @error('carname')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
        </div>
        <div class="mb-3  px-2 col-12 col-lg-6 w-lg-100">
            <label for="" class="form-label text-white fs-7 "> اسم الشركة</label>
            <select name="category_id" value="{{ old('category_id') }}" class="form-select  text-light"
                id="inputGroupSelect03" aria-label="Example select with button addon">
                @foreach ($categories as $category)
                    @if ($category->is_active == 1)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
        </div>

        <div class="mb-3 px-2 d-flex col-12 col-lg-6 justify-content-end">
            <div class="mb-3 w-50 px-2 ">
                <label for="" class="form-label text-white fs-7 "> موديل السيارة</label>
                <div class="input-group ">
                <input type="text" value="{{ old('model') }}" name="model"
                        class="form-control  " id="basic-url" aria-describedby="basic-addon3">
                </div>
                @error('model_id')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>

            <div class="mb-3 w-50 px-2 ">
                <label for="" class="form-label text-white">اسم المحرك</label>
                <div class="input-group">
                    <input type="text" name="name_enige" value="{{ old('name_enige') }}"
                        class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                @error('name_enige')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>
        </div>

                <div class="mb-3 px-2 d-flex flex-wrap col-12 col-lg-6 justify-content-end">
            <div class="mb-3 w-50 px-2 w-lg-100">
                <label for="" class="form-label text-white">لون السيارة</label>
                <div class="input-group">
                    <input type="text" name="color" value="{{ old('color') }}" 
                        class="form-control" id="basic-url" aria-describedby="basic-addon3">

                </div>
                @error('color')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>

            <div class="mb-3 w-50 px-2 w-lg-100">
                <label for="basic-url" class="form-label text-light fs-7"> حالة السيارة</label>
                <div class=" d-flex">
                    <input class="form-check-input mx-2" type="radio" name="care_type" value="1" {{ (old('care_type') == '1') ? 'checked' : ''}}  id="flexRadioDefault1">
                    <div class="form-check ">
                        <label class="form-check-label text-light" for="flexRadioDefault1">
                            جديد
                        </label>

                    </div>
                    <input class="form-check-input mx-2" type="radio" name="care_type" value="2" {{ (old('care_type') == '2') ? 'checked' : ''}} id="flexRadioDefault2">
                    <div class="form-check ">
                        <label class="form-check-label text-light" for="flexRadioDefault2">
                            مستخدم
                        </label>
                    </div>php
                </div>
                @error('care_type')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>
        </div>
        
        <div class="mb-3 px-2 d-flex flex-wrap  col-12 col-lg-6 justify-content-end">
            <div class="mb-3 w-50 px-2 w-lg-100">
                <label for="" class="form-label text-white">نوع الضرر</label>
                <div class="input-group">
                    <select name="type_damage" id="" class="form-select text-light">
                        @foreach ($damage as $key => $value)
                            @if (old('type_damage') == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option>
                            @else
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('type_damage')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>

            

        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="" class="form-label text-white">المدينة</label>
            <div class="input-group">
                <select name="city" id="" class="form-select text-light">
                    @foreach ($city as $key => $value)
                        @if (old('city') == $key)
                            <option value="{{ $value }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('city')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
        </div>


        </div>

        <div class="mb-3 px-2  d-flex col-12 flex-wrap  flex-xl-nowrap col-lg-6  ">
            <div class="mb-3 w-50 px-2 w-lg-100">
                <label for="" class="form-label text-white"> سعر السيارة الابتدائي</label>
                <div class="input-group">
                    <input type="text" name="start_price" value="{{ old('start_price') }}"
                        class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                @error('start_price')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>
            <div class="mb-3 w-50 px-2 w-lg-100">
                <label for="" class="form-label text-white">مقدار الزيادة <span class="yellow fs-6"> 
                        </span></label>
                <div class="input-group">
                    <input type="text" name="auction_price" value="{{ old('auction_price') }}"
                        class="form-control" id="basic-url" aria-describedby="basic-addon3">
                </div>
                @error('auction_price')
                    <span class="text-end yellow">* {{ $message }} </span>
                @enderror
            </div>

            <div class="mb-3  px-2 w-lg-100">
            <label for="" class="form-label text-white">التأريخ النهائي للمزاد</label>
            <div class="input-group">
                <input type="date" name="end_date" value="{{ old('end_date') }}"
                    class="form-control" id="basic-url" aria-describedby="basic-addon3">
            </div>
            @error('end_date')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
        </div>

        </div>

        <div class="mb-3 px-2 d-flex flex-column flex-lg-row col-12 col-lg-6 justify-content-end">
            <div class=" w-100 px-2 w-lg-100">
            <label for="" class="form-label text-white">عنوان تواجد السيارة</label>
            <div class="input-group mb-3">
                <input type="text" name="address_car" value="{{ old('address_car') }}" 
                    class="form-control " id="basic-url" aria-describedby="basic-addon3">
            </div>
            @error('address_car')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
        </div>

        <div class=" w-100 px-2 w-lg-100">
            <label for="img" class="form-label text-light fs-7">الصورة الرئيسية للسيارة</label>
            <div class="input-group ">
                <input type="file" name="image" id="img" oninput="previewImage.src=window.URL.createObjectURL(this.files[0])" class="form-control"  accept = 'image/jpeg , image/jpg, image/gif, image/png'>
            </div>
            @error('image')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror

            <div class="my-2 m-auto" style="font-size: 0;">
                  <img id="previewImage" 
                     style="max-height: 100px;">
              </div>
        </div>

        

        </div>
        
        

        <div class=" col-12 col-lg-6 px-2 w-lg-100">
            <label for="img" class="form-label text-light fs-7">صور أخرى</label>
            <div class="input-group">
                <input type="file" name="images[]"
                class="form-control text-light "  id="inputGroupFile01" accept="image/jpeg ,image/png , image/gif"
                     multiple>
            </div>
              @error('images')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
            <div class="col-lg-12 mb-2 my-2 m-auto preview"></div>
        </div>
        

        <div class=" col-12 col-lg-6 px-2 w-lg-100">
            <label for="" class="form-label text-white">معلومات اخرى حول السيارة</label>
            <div class="input-group">
                <textarea name="description" id="textarea#default" rows="4" class="form-control mb-2"  
                    aria-label="With textarea">{{old('description')}}</textarea>
            </div>
            @error('description')
                <span class="text-end yellow">* {{ $message }} </span>
            @enderror
        </div>

        
        <div class="col-12"></div>
        
        <div class="btn-group  w-25 my-auto mx-3 save-btn" role="group" aria-label="Basic example">
            <button type="submit" class="btn contact my-3 rounded-0">اضافة مزاد</button>

        </div>
    </form>
@else

<div class="d-flex flex-wrap  justify-content-center align-items-center text-center">


<h1 class="text-warning col-12 my-5"> خطاءلايمكنك الوصول</h1>
<h6 class="col-10 ">عذرا يجب عليك اتمام عملية تسجيل الدخول وادخال بيانات الدفع حتى تتمكن من اضافة مزاد </h6>

<img class=" image-fluid m-auto col-9 col-lg-6  my-3" src="assets/images/error.png"  height=""alt="">
<a href="{{route('complate_regester')}}" class="card-link active text-center mt-5 mb-2 col-12">اتمام عملية التسجيل     <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>


</div>


@endif

   
@stop