@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')

        <h1 class="text-center fs-3 text-white">ادارة صور السلايدر</h1>
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success message">
                    {{ session()->get('success') }}
                </div>
            @endif
            <a href="slider_image?do=Add" class="btn p-2 contact">
                <i class="fa fa-plus"></i> اضافة صورة
            </a>
            <div class="table-responsive text-white ms-5">
                <table class="main-table manage-members text-center table table-bordered  text-white">
                    <tr>
                        <td class="text-warning">#ID</td>
                        <td class="text-warning"> الصورة</td>
                        <td class="text-warning">التحكم</td>
                    </tr>

                    <?php $i = 1; ?>
                    @foreach ($Slider as $slider)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><img src="{{ URL::asset('images/' . $slider->image) }}" width="200"
                                    alt="{{ $slider->image }}"></td>
                            <td class="d-flex justify-content-center align-items-center">
                                <a href="slider_image?do=Edit&sliderid={{ $slider->id }}" class="edit p-1 mx-2">
                                    <i class='fa fa-edit'></i>
                                    تعديل
                                </a>
                                @if ($slider->is_active == 1)
                                    <label class="switch" data-bs-toggle="modal"
                                        data-bs-target="#activeslider{{ $slider->id }}">
                                        <input type="checkbox" checked>
                                        <span class="slider"></span>
                                    </label>
                                @else
                                    <label class="switch" data-bs-toggle="modal"
                                        data-bs-target="#activeslider{{ $slider->id }}">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                @endif

                            </td>
                        </tr>
                        <div class="modal fade user" id="deleteslider{{ $slider->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-dark">
                                    <form action="delete_admin_slider" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                            <h5 class="modal-title " id="exampleModalLabel">حذف طريقة دفع</h5>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="sliderid" value="{{ $slider->id }}">
                                            <h2>هل انت متاكد</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">تراجع</button>
                                            <input type="submit" class="btn btn-primary" value="حذف" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade user" id="activeslider{{ $slider->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-grey">
                                    <form action="{{ route('active_slider_image', $slider->id) }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">حالة  الصورة</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="sliderid" value="{{ $slider->id }}">
                                            <h2>هل انت متاكد</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class=" bg-lighter text-white fs-5"
                                                data-bs-dismiss="modal">تراجع</button>
                                            <input type="submit" class=" btn p-2 contact"
                                                value=" تعديل حالة الصورة  " />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </table>
            </div>


        </div>
    @elseif($do == 'Add')
        <!-- start add model -->
        <h1 class="text-center">اضافة صورة للسلايدر</h1>
        <div class="container ">
            @if ($errors->any())
                <div class="alert alert-danger message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="add_slider_image" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Start slider -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">صورة جديدة </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="file" name="image" id="image" oninput="previewImage.src=window.URL.createObjectURL(this.files[0])" class="form-control"  class="form-control" autocomplete="off"
                            placeholder="اضف صورة جدبدة">
                        <div class="col-md-12 mb-2 my-2 m-auto">
                            <img id="previewImage" 
                                style="max-height: 100px;">
                        </div>
                    </div>

                </div>

                <!-- End slider -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="اضافة صورة جديدة'" class=" btn p-2 contact ">
                    </div>
                </div>
                <!-- End Submit -->
            </form>
        </div>
    @elseif($do == 'Edit')
        <!-- start Edit model -->
        {{ $sliderid = isset($_GET['sliderid']) && is_numeric($_GET['sliderid']) ? intval($_GET['sliderid']) : 0 }}
        <h1 class="text-center">تغيير الصورة</h1>
        <div class="container col-lg-8 col-11">
            @if ($errors->any())
                <div class="alert alert-danger message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @foreach ($Slider as $slider)
                @if ($slider->id == $sliderid)
                    <form action="{{ route('edit_slider_image', $sliderid) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sliderid" value="{{ $sliderid }}">
                        <!-- Start slider -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-white">تعديل الصورة </label>
                            <div class="col-sm-8 col-md-9">
                                <input type="file" name="image" id="image" oninput="imageTwo.src=window.URL.createObjectURL(this.files[0])"class="form-control" autocomplete="off"
                                    placeholder=" اضف طريقة دفع">
                                <div class="col-md-12 mb-2 my-2 m-auto">
                                    <img id="imageTwo" 
                                        style="max-height: 100px;">
                                </div>
                            </div>

                        </div>
                        <!-- End slider -->
                        <!-- Start Submit -->
                        <div class="mb-2 row">
                            <div class="offset-sm-2 col-sm-10">
                                <input type="submit" value="تغيير  الصورة" class=" btn p-2 contact">
                            </div>
                        </div>
                        <!-- End Submit -->

                    </form>
                @endif
            @endforeach
        </div>
    @endif
@endsection
