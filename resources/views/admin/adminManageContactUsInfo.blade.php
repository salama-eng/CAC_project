@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3 text-white">ادارة طرق التواصل</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif
        <a href="manage_contact_us?do=Add" class="btn p-2 contact">
            <i class="fa fa-plus"></i> اضافة طريقة تواصل
        </a>
        <div class="table-responsive text-white">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td class="text-warning">#ID</td>
                    <td class="text-warning"> الاسم</td>
                    <td class="text-warning"> الرابط او رقم الهاتف </td>
                    <td class="text-warning"> الايقونة</td>
                    <td class="text-warning">التحكم</td>
                </tr>

                <?php $i = 1 ?>
                @foreach($Information as $information)
                <tr>
                    <td>{{$i++}}</td>
                    <td class="text-warning"> {{$information->name}}</td>
                    <td class="text-warning"> {{$information->link}}</td>
                    <td class="text-warning"> <i class="{{$information->icon}}"></i></td>
                    <td class="d-flex justify-content-center align-items-center">
                        <a href="manage_contact_us?do=Edit&informationid={{$information->id}}" class="edit p-1 mx-2">
                            <i class='fa fa-edit'></i>
                            تعديل 
                        </a>
  
                         @if($information->is_active == 1)
                            <label class="switch" data-bs-toggle="modal" data-bs-target="#activeinformation{{$information->id}}">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                              </label>
                        @else
                         <label class="switch" data-bs-toggle="modal" data-bs-target="#activeinformation{{$information->id}}">
                                <input type="checkbox">
                                <span class="slider"></span>
                              </label>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="deleteinformation{{$information->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="delete_admin_information" method="post">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title " id="exampleModalLabel">حذف طريقة دفع</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="informationid" value="{{$information->id}}">
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
                <div class="modal fade user" id="activeinformation{{$information->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-grey">
                            <form action="{{ route('active_contact_us',$information->id) }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة طريقه التواصل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="informationid" value="{{$information->id}}">
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class=" bg-lighter text-white fs-5" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class=" bg-yellow text-white fs-5" value=" تعديل   " />
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
<h1 class="text-center fs-3 mb-5">اضافة طريقة تواصل جدبدة</h1>
<div class="container col-lg-8 col-11">
    @if ($errors->any())
        <div class="alert message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="add_contact_us" method="POST" enctype="multipart/form-data">
    @csrf
        <!-- Start information -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">الاسم    </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="name" value="{{old('name')}}" class="form-control" autocomplete="off" placeholder=" اضف  اسم طريقة التواصل">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   الرابط </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="link" value="{{old('link')}}" class="form-control" autocomplete="off" placeholder=" اضف  الرابط">
            </div>
            
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">الايقونة   </label>
            <div class="col-sm-8 col-md-9">
                <select name="icon" value="{{old('icon')}}" class="fa p-2 bg-dark fs-5 text-white  border border-white w-100 h-10" style="direction:ltr ; " id="">
                    <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                    <option value="fa fa-globe" class="fa">&#xf0ac  (site)</option>
                    <option value="fa fa-envelope" class="fa">&#xf0e0  (email)</option>
                    <option value="fa fa-mobile" class="fa">&#xf10b  (mobile)</option>
                    <option value="fa fa-phone" class="fa">&#xf095  (phone)</option>
                    <option value="fa fa-instagram" class="fa">&#xf16d  (instagram)</option>
                    <option value="fa fa-whatsapp" class="fa">&#xf232  (whatsapp)</option>
                    <option value="fa fa-twitter" class="fa">&#xf099  (twitter)</option>
                    <option value="fa fa-facebook" class="fa">&#xf082  (facebook)</option>
                    
                </select>
            </div>
            
        </div>

        <!-- Start Active -->
        <div class="form-check d-flex  justify-content-center my-5 ">
            <input class="form-check-input col-7" type="checkbox" id="blankCheckbox" name="active" value="1"
                aria-label="...">
            <label class="col-6 mx-5 text-white" for="">تفعيل</label>
        </div>
        <!-- End Active -->

        <!-- End information -->
        <!-- Start Submit -->
        <div class="mb-2 row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="اضافة طريقة التواصل '" class=" btn p-2 contact">
            </div>
        </div>
        <!-- End Submit -->
    </form>
</div>

@elseif($do == 'Edit')
<!-- start Edit model -->
{{$informationid = isset($_GET['informationid']) && is_numeric($_GET['informationid']) ? intval($_GET['informationid']) : 0;}}
<h1 class="text-center fs-3 mb-5">تعديل طريقة التواصل </h1>
<div class="container col-lg-8 col-11">
    @if ($errors->any())
        <div class="alert message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($Information as $information)
        @if($information->id == $informationid)
            <form action="{{ route('edit_contact_us',$informationid) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="informationid" value="{{$informationid}}">
                <!-- Start information -->
            <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">الاسم    </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="name" value="{{$information->name}}" class="form-control" autocomplete="off" placeholder=" اضف  اسم طريقة التواصل">
            </div>
            
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">   الرابط </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="link" value="{{$information->link}}" class="form-control" autocomplete="off" placeholder=" اضف  الرابط">
            </div>
            
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">الايقونة   </label>
            <div class="col-sm-8 col-md-9 mb-5">
                <select name="icon" value="{{$information->icon}}" class="fa p-2 bg-dark fs-5 text-white  border border-white w-100 h-10" style="direction:ltr ; " id="">
                    <option value="fa fa-location-arrow" class="fa">&#xf124 (location)</option>
                    <option value="fa fa-globe" class="fa">&#xf0ac  (site)</option>
                    <option value="fa fa-envelope" class="fa">&#xf0e0  (email)</option>
                    <option value="fa fa-mobile" class="fa">&#xf10b  (mobile)</option>
                    <option value="fa fa-phone" class="fa">&#xf095  (phone)</option>
                    <option value="fa fa-instagram" class="fa">&#xf16d  (instagram)</option>
                    <option value="fa fa-whatsapp" class="fa">&#xf232  (whatsapp)</option>
                    <option value="fa fa-twitter" class="fa">&#xf099  (twitter)</option>
                    <option value="fa fa-facebook" class="fa">&#xf082  (facebook)</option>
                    
                </select>
            </div>
            
        </div>
        <!-- End information -->
            
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل  طريقة التواصل" class=" btn p-2 contact ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                