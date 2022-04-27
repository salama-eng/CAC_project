@extends('front.layout.clientdashboard')
@section('content')
    <form class="container  px-5 fs-6 d-flex flex-wrap">
        @csrf
        <h5 class="w-100 text-light mx-2 "><i class="fa fa-plus p-2 fs-6"></i>إضافة مزاد</h5>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="اسم السيارة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <select name="category_id" class="form-select text-light" id="inputGroupSelect03"
                aria-label="Example select with button addon">
                <option value="الصنف">الصنف</option>
                @foreach ($categories as $category)
                    <option value="">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <select name="model_id" class="form-select text-light" id="inputGroupSelect03"
                    aria-label="Example select with button addon">
                    <option value="المودل">المودل</option>
                    {{-- @foreach ($models as $model)
                    <option value="">{{$model->model_id}}</option>
                    @endforeach --}}
                    <option value="">pmw</option>
                </select>
            </div>
        </div>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="اسم المحرك" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="سعر المزايدة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="سقف سعر المزايدة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>

        
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="عنوان تواجد السيارة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="لون السيارة" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">

                <input type="text" placeholder="نوع الضرر" class="form-control" id="basic-url"
                    aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <div class="input-group">
                <textarea class="form-control" placeholder="وصف السيارة" aria-label="With textarea"></textarea>
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="img" class="form-label text-light">الصورة الرئيسية للسيارة</label>
            <div class="input-group ">
                <input type="file" id="img" class="form-control"
                    id="inputGroupFile01">
            </div>
        </div>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="img" class="form-label text-light">صور أخرى</label>
            <div class="input-group">

                <input type="file"  class="form-control text-light" id="inputGroupFile01" multiple>
            </div>
        </div>
        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="basic-url" class="form-label text-light"> حالة السيارة</label>
            <div class=" d-flex">
                <input class="form-check-input mx-2" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <div class="form-check ">
                    <label class="form-check-label text-light" for="flexRadioDefault1">
                        جديد
                    </label>

                </div>
                <input class="form-check-input mx-2" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <div class="form-check ">
                    <label class="form-check-label text-light" for="flexRadioDefault2">
                        مستخدم
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3 w-50 px-2 w-lg-100">
            <label for="basic-url" class="form-label text-light"> حالة المستخدم</label>
            <div class=" d-flex">
                <input class="form-check-input mx-2" type="radio" name="flexRadioDefault6" id="flexRadioDefault3">
                <div class="form-check ">
                    <label class="form-check-label text-light" for="flexRadioDefault3">
                        تفعيل
                    </label>

                </div>
                <input class="form-check-input mx-2" type="radio" name="flexRadioDefault6" id="flexRadioDefault4" checked>
                <div class="form-check ">
                    <label class="form-check-label text-light" for="flexRadioDefault4">
                        تعطيل
                    </label>
                </div>
            </div>
        </div>
        <div class="btn-group w-25 m-auto save-btn" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary my-3 rounded-0">حفظ</button>

        </div>
    </form>

@stop
