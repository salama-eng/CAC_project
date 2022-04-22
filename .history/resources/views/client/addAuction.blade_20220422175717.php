@extends('client.layout.clientdashboard')
@section('content')
    <form class="container px-5 fs-6 d-flex flex-wrap" action="save_post" method="POST" enctype="multipart/form-data">
        @csrf
        @if (session()->has('message'))
            <p class="alert alert-danger">{{ session()->get('message') }}</p>
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <p class="alert alert-danger ">{{ $err }}</p>
            @endforeach
        @endif
        <h5 class="w-100 text-light mx-2 my-4"><i class="fa fa-plus p-2 fs-6"></i>إضافة مزاد</h5>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" value="{{old('carname')}}" name="carname" placeholder="اسم السيارة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <select name="category_id" value="{{old('category_id')}}" class="form-select text-light" id="inputGroupSelect03"
                aria-label="Example select with button addon">
                <option value="الصنف">الصنف</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <select name="model_id" value="{{old('model_id')}}" class="form-select text-light" id="inputGroupSelect03"
                    aria-label="Example select with button addon">
                    <option value="المودل">المودل</option>
                    @foreach ($models as $model)
                        <option value="{{$model->id}}">{{$model->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" name="name_enige" value="{{old('name_enige')}}" placeholder="اسم المحرك" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" name="start_price" value="{{old('start_price')}}" placeholder="سعر المزايدة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" name="auction_price" value="{{old('auction_price')}}" placeholder="سقف سعر المزايدة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>

        
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" name="address_car" value="{{old('address_car')}}" placeholder="عنوان تواجد السيارة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" name="color" value="{{old('color')}}" placeholder="لون السيارة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        

                
            
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="date" name="end_date" value="{{old('end_date')}}" title ="تاريخ انتهاء العرض" placeholder="تاريخ انتهاء العرض" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" name="type_damage" value="{{old('type_damage')}}" placeholder="نوع الضرر" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">
                <textarea name="description" value="{{old('description')}}" class="form-control" placeholder="وصف السيارة" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="img" class="form-label text-light">الصورة الرئيسية للسيارة</label>
            <div class="input-group ">
                <input type="file" name="image" id="img" class="form-control"
                    id="inputGroupFile01">
            </div>
        </div>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="img" class="form-label text-light">صور أخرى</label>
            <div class="input-group">

                <input type="file" name="images[]"  class="form-control text-light" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" multiple>
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="basic-url" class="form-label text-light"> حالة السيارة</label>
            <div class=" d-flex">
                <input class="form-check-input mx-2" type="radio" name="care_type" value="1" id="flexRadioDefault1">
                <div class="form-check ">
                    <label class="form-check-label text-light" for="flexRadioDefault1">
                        جديد
                    </label>

                </div>
                <input class="form-check-input mx-2" type="radio" name="care_type" value="2" id="flexRadioDefault2" checked>
                <div class="form-check ">
                    <label class="form-check-label text-light" for="flexRadioDefault2">
                        مستخدم
                    </label>
                </div>
            </div>
        </div>

        
        <div class="btn-group w-25 m-auto save-btn" role="group" aria-label="Basic example">
            <button type="submit" class="btn btn-primary my-3 rounded-0">حفظ</button>

        </div>
    </form>

@stop
