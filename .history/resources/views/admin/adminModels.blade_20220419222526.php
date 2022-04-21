@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center  text-white">ادارة الموديلات</h1>
    <div class="container container-for-input">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <a  href="adminModels?do=Add" class="btn btn-sm bg-yellow mb-2">
            <i class="fa fa-plus"></i> اضافة موديل
        </a>
        <div class="table-responsive text-white">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr class="text-warning" >
                    <td  class="text-warning">#ID</td>
                    <td class="text-warning">الموديل</td>
                    <td class="text-warning">التحكم</td>
                </tr>

                @foreach($models as $model)
                <tr>
                    <td>1</td>
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="adminModels?do=Edit&modelid={{$model->id}}" class="btn btn-success">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        
                        @if($model->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activeModel{{$model->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activeModel{{$model->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="deleteModel{{$model->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content input">
                            <form action="delete_admin_model" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حذف الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input class="input" type="hidden" name="companyid" value="{{$model->id}}">
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="حذف" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="activeModel{{$model->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="active_admin_model" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="modelid" value="{{$model->id}}">
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="تعديل الحالة" />
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

<h1 class="text-center fs-3 m-4">اضافة موديل جديد</h1>
<div class="container col-lg-9 col-11">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="add_admin_model" method="POST">
    @csrf
        <!-- Start Model -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">موديل جديد</label>
            <div class="col-sm-8 col-md-9">
                <input  type="text" name="model" class="form-control input" autocomplete="off" placeholder="اضف موديل جديد">
            </div>
        </div>
        <!-- End Model -->
        <!-- Start Submit -->
        <div class="mb-2 row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="اضافة موديل" class=" btn bg-yellow ">
            </div>
        </div>
        <!-- End Submit -->
    </form>
</div>
@elseif($do == 'Edit')
{{$modelid = isset($_GET['modelid']) && is_numeric($_GET['modelid']) ? intval($_GET['modelid']) : 0;}}
<h1 class="text-center">Edit Modal</h1>
<div class="container ">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($models as $model)
        @if($model->id == $modelid)
            <form action="edit_admin_model" method="POST">
                @csrf
                <input type="hidden" name="modelid" value="{{$modelid}}">
                <!-- Start Model -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">موديل جديد</label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="model" value="{{$model->name}}" class="form-control input" autocomplete="off" placeholder="ادخل اسم الموديل">
                    </div>
                </div>
                <!-- End Model -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل الموديل" class=" btn btn-primary ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                