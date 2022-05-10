@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3 text-white">ادارة شركائنا</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        <a href="membership?do=Add" class="btn p-2 contact">
            <i class="fa fa-plus"></i> اضافة صورة
        </a>
        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td class="text-warning">#ID</td>
                    <td class="text-warning"> الاسم</td>
                    <td class="text-warning"> الايميل</td>
                    <td class="text-warning"> الهاتف</td>
                    <td class="text-warning"> الصورة</td>
                    <td class="text-warning"> العنوان</td>
                    <td class="text-warning"> الوصف</td>
                    <td class="text-warning">التحكم</td>
                </tr>

                <?php $i = 1 ?>
                @foreach($memberships as $membership)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="text-warning"> {{$membership->name}}</td>
                    <td class="text-warning"> {{$membership->email}}</td>
                    <td class="text-warning"> {{$membership->phone}}</td>
                    <td><img src="{{ URL::asset('images/'.$membership->image) }}" width="80" alt="{{$membership->image}}" ></td>
                    <td class="text-warning"> {{$membership->address}}</td>
                    <td class="text-warning"> {{$membership->description}}</td>
                    
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="membership?do=Edit&membershipid={{$membership->id}}" class="edit p-1 mx-2">
                            <i class='fa fa-edit'></i>
                            تعديل 
                        </a>
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
                @endforeach
            </table>
        </div>
       
      
    </div>
@elseif($do == 'Add')
<!-- start add model -->
<h1 class="text-center">Add New membership</h1>
<div class="container col-lg-8 col-11 m-auto">
    @if ($errors->any())
        <div class="alert alert-danger message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="add_membership"  method="POST"  enctype="multipart/form-data">
    @csrf
        <!-- Start membership -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">اسم الشركة   </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="name"  class="form-control" autocomplete="off" placeholder=" اضف  شركة">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">  رقم الهاتف </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="phone"  class="form-control" autocomplete="off" placeholder=" اضف طريقة دفع">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   الايميل </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="email"  class="form-control" autocomplete="off" placeholder=" اضف طريقة دفع">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   العنوان </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="address"  class="form-control" autocomplete="off" placeholder=" اضف طريقة دفع">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">صورة   </label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="image" oninput="previewImage.src=window.URL.createObjectURL(this.files[0])" id="image" class="form-control" autocomplete="off" placeholder=" اضف طريقة دفع">
                <div class="col-sm-3 m-2  col-md-6">
                  <img id="previewImage" style="max-height: 100px;">
              </div>
            </div>

            <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">  الوصف  </label>
            <div class="col-sm-8 col-md-9">
                <textarea name="description" placeholder=" اضف  الوصف" class="form-control  " style="width:103%" id="" rows="5" ></textarea>
            </div>
            
        </div>
            
        </div>

        <!-- End membership -->
        <!-- Start Submit -->
        <div class="mb-2 row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="اضافة صورة جديدة'" class=" btn p-2 contact">
            </div>
        </div>
        <!-- End Submit -->
    </form>
</div>

@elseif($do == 'Edit')
<!-- start Edit model -->
{{$membershipid = isset($_GET['membershipid']) && is_numeric($_GET['membershipid']) ? intval($_GET['membershipid']) : 0;}}
<h1 class="text-center">Edit Membership</h1>
<div class="container col-lg-8 col-11 m-auto">
    @if ($errors->any())
        <div class="alert alert-danger message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($memberships as $membership)
        @if($membership->id == $membershipid)
            <form action="{{ route('edit_membership',$membershipid) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="membershipid" value="{{$membershipid}}">
                <!-- Start membership -->
                <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">اسم الشركة   </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="name" value="{{$membership->name}}" class="form-control" autocomplete="off" placeholder=" اضف  شركة">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">  رقم الهاتف </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="phone" value="{{$membership->phone}}" class="form-control" autocomplete="off" placeholder=" اضف رقم الهاتف">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   الايميل </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="email" value="{{$membership->email}}" class="form-control" autocomplete="off" placeholder=" اضف ايميل الشركة">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   العنوان </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="address" value="{{$membership->address}}" class="form-control" autocomplete="off" placeholder=" اضف عنزان الشركة">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">صورة   </label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="image" oninput="imageTwo.src=window.URL.createObjectURL(this.files[0])" id="image" class="form-control" autocomplete="off" placeholder=" اضف صورة الشركة">
                <div class="col-sm-4 m-2 col-md-6">
                  <img id="imageTwo" style="max-height:100px">
              </div>
            </div>

            <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">  الوصف  </label>
            <div class="col-sm-8 col-md-9">
                <textarea name="description" placeholder=" اضف الوصف " class="form-control  " style="width:103%" id="" rows="5" ></textarea>
            </div>
            
        </div>
            
        </div>  
                <!-- End membership -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل  الصورة" class=" btn p-2 contact ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                