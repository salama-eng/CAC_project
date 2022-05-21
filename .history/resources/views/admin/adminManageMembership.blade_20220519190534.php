@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')
<!-- start page content -->
<h1 class="text-center fs-3 text-white">ادارة شركائنا</h1>
    <div class="container">

        <!-- start message -->
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        <!-- end message -->

        <a href="membership?do=Add" class="btn p-2 contact">
            <i class="fa fa-plus"></i> اضافة صورة
        </a>
        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr style="  vertical-align: center !important;" >
                    <th  class="text-warning align-middle">#ID</th>
                    <th class="text-warning align-middle"> الاسم</th>
                    <th class="text-warning align-middle"> الايميل</th>
                    <th class="text-warning align-middle"> الهاتف</th>
                    <th class="text-warning align-middle"> الصورة</th>
                    <th class="text-warning align-middle"> العنوان</th>
                    <th class="text-warning align-middle"> الوصف</th>
                    <th class="text-warning align-middle">تعديل</th>
                    <th class="text-warning align-middle">التحكم</th>
                </tr>

                <?php $i = 1 ?>
                @foreach($memberships as $membership)
                <tr>
                    <td>{{$i++}}</td>
                    <td> {{$membership->name}}</td>
                    <td > {{$membership->email}}</td>
                    <td > {{$membership->phone}}</td>
                    <td><img src="{{ URL::asset('images/'.$membership->image) }}" width="80" alt="{{$membership->image}}" ></td>
                    <td> {{$membership->address}}</td>
                    <td> {{$membership->description}}</td>
                    
                    <td>
                        <a href="membership?do=Edit&membershipid={{$membership->id}}" class="edit p-1 mx-2">
                            <i class='fa fa-edit'></i>
                            تعديل 
                        </a>
                    </td>
                    <td>
                        @if($membership->is_active == 1)
                            <label class="switch" data-bs-toggle="modal" data-bs-target="#activemembership{{$membership->id}}">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                              </label>
                        @else
                         <label class="switch" data-bs-toggle="modal" data-bs-target="#activemembership{{$membership->id}}">
                                <input type="checkbox">
                                <span class="slider"></span>
                              </label>
                        @endif
                        
                    </td>
                </tr>

                <!-- start Delete model -->
                <div class="modal fade user" id="deletemembership{{$membership->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="delete_admin_membership" method="post">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title " id="exampleModalLabel">حذف طريقة دفع</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="membershipid" value="{{$membership->id}}">
                                    <h2 >هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="حذف" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Delete model -->

                <!-- start Active model -->
                <div class="modal fade user" id="activemembership{{$membership->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-grey">
                            <form action="{{ route('active_membership',$membership->id) }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة  الشركة</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="membershipid" value="{{$membership->id}}">
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class=" bg-yellow text-white fs-5" value=" تعديل الصورة  " />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Active model -->

                @endforeach
            </table>
        </div>
    </div>
    <!-- End Page Content -->

@elseif($do == 'Add')
<!-- start add model -->
<h1 class="text-center fs-3 mb-5">اضافة شركة جديدة</h1>
<div class="container col-lg-8 col-11 m-auto">
    <form action="add_membership"  method="POST"  enctype="multipart/form-data">
    @csrf
        <!-- Start membership -->

        <!-- Start Name input -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">اسم الشركة   </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="name" value="{{old('name')}}" class="form-control" autocomplete="off" placeholder=" اضف  شركة">
                @error('name')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
            </div>
        </div>
        <!-- End Name input -->

        <!-- Start phone input -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">  رقم الهاتف </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="phone" value="{{old('phone')}}" class="form-control" autocomplete="off" placeholder=" اضف رقم هاتف الشركة">
                @error('phone')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
            </div>
        </div>
        <!-- End phone input -->

        <!-- Start email input -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   الايميل </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="email" value="{{old('email')}}" class="form-control" autocomplete="off" placeholder=" اضف ايميل الشركة">
                @error('email')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
            </div>
        </div>
        <!-- End email input -->

        <!-- Start address input -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   العنوان </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="address" value="{{old('address')}}" class="form-control" autocomplete="off" placeholder=" اضف عنوان الشركة">
                @error('address')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
            </div>
        </div>
        <!-- End address input -->

        <!-- Start image input -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">صورة   </label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="image" value="{{old('image')}}" oninput="previewImage.src=window.URL.createObjectURL(this.files[0])" id="image" class="form-control" autocomplete="off" placeholder=" اضف صورة الشركة">
                @error('image')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
                <div class="col-sm-3 m-2  col-md-6">
                  <img id="previewImage" style="max-height: 100px;">
              </div>
            </div>
        </div>
        <!-- End image input -->

        <!-- Start description input -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">  الوصف  </label>
            <div class="col-sm-8 col-md-9">
                <textarea name="description"  placeholder=" اضف  الوصف" class="form-control  " style="width:103%" id="" rows="5" >{{old('description')}}</textarea>
                @error('description')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
            </div>
        </div>
        <!-- End description input -->
        <!-- End membership -->

        <!-- Start Active -->
        <div class="form-check d-flex  justify-content-center mb-5 ">
            <input class="form-check-input col-7" type="checkbox" id="blankCheckbox" name="active" value="1"
                aria-label="...">
            <label class="col-6 mx-5 text-white" for="">تفعيل</label>
        </div>
        <!-- End Active -->

        <!-- Start Submit -->
        <div class="mb-2 row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="اضافة شركة جديدة'" class=" btn p-2 contact">
            </div>
        </div>
        <!-- End Submit -->
    </form>
</div>

@elseif($do == 'Edit')
<!-- start Edit model -->
{{$membershipid = isset($_GET['membershipid']) && is_numeric($_GET['membershipid']) ? intval($_GET['membershipid']) : 0;}}
<h1 class="text-center fs-3 mb-5">تعديل معلومات الشركة</h1>
<div class="container col-lg-8 col-11 m-auto">
    @foreach($memberships as $membership)
        @if($membership->id == $membershipid)
            <form action="{{ route('edit_membership',$membershipid) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="membershipid" value="{{$membershipid}}">
                <!-- Start membership -->
                <!-- Start Name Input -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">اسم الشركة   </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="name" value="{{$membership->name}}" class="form-control" autocomplete="off" placeholder=" اضف  شركة">
                        @error('name')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End Name Input -->

                <!-- Start phone Input -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">  رقم الهاتف </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="phone" value="{{$membership->phone}}" class="form-control" autocomplete="off" placeholder=" اضف رقم الهاتف">
                        @error('phone')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End phone Input -->

                <!-- Start Email Input -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">   الايميل </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="email" value="{{$membership->email}}" class="form-control" autocomplete="off" placeholder=" اضف ايميل الشركة">
                        @error('email')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End Email Input -->

                <!-- Start address Input -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">   العنوان </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="address" value="{{$membership->address}}" class="form-control" autocomplete="off" placeholder=" اضف عنزان الشركة">
                        @error('address')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End address Input -->

                <!-- Start Image Input -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">صورة   </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="file" name="image" oninput="imageTwo.src=window.URL.createObjectURL(this.files[0])" id="image" class="form-control" autocomplete="off" placeholder=" اضف صورة الشركة">
                        @error('image')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                        <div class="col-sm-4 m-2 col-md-6">
                        <img id="imageTwo" style="max-height:100px">
                    </div>
                </div>
                <!-- End Image Input -->

                <!-- Start description Input -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">  الوصف  </label>
                    <div class="col-sm-8 col-md-9">
                        <textarea name="description" placeholder=" اضف الوصف " class="form-control  " style="width:103%" id="" rows="5" ></textarea>
                        @error('description')
                            <span class="text-end yellow">* {{ $message }}  </span>
                        @enderror
                    </div>
                </div>
                <!-- End description Input -->
                <!-- End membership -->

                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل  معلومة الشركة" class=" btn p-2 contact ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                