@extends('admin.layout.adminDashboard')
@section('content')



<h1 class="text-center">ادارة الموديلات</h1>
    <div class="container">
        <a href="" class="btn btn-sm " data-bs-toggle="modal" data-bs-target="#addModel">
            <i class="fa fa-plus"></i> اضافة موديل
        </a>
        <div class="table-responsive">
            <table class="main-table manage-members text-center table table-bordered">
                <tr>
                    <td>#ID</td>
                    <td>الموديل</td>
                    <td>التحكم</td>
                </tr>

                @foreach($models as $model)
                <tr>
                    <td>1</td>
                    <td>{{$model->name}}</td>
                    <td>
                        <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModel{{$model->id}}">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deleteModel{{$model->id}}">
                            <i class='fa fa-close'></i> Delete
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
                <div class="modal fade user" id="editModel{{$model->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="edit_admin_model" method="post" >
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">تعديل الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="companyid" value="{{$model->id}}">
                                    <!-- Start Model -->
                                    <div class="mb-2 row">
                                        <label class="col-sm-3 col-form-label">اسم الموديل</label>
                                        <div class="col-sm-8 col-md-9">
                                            <input type="text" name="model" value="{{$model->name}}" class="form-control" autocomplete="off" required="required" placeholder="ادخل اسم الموديل">
                                        </div>
                                    </div>
                                    <!-- End Model -->
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="تعديل" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade user" id="deleteModel{{$model->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="delete_admin_model" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حذف الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="companyid" value="{{$model->id}}">
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
                        <div class="modal-content">
                            <form action="active_admin_model" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة الموديل</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="companyid" value="{{$model->id}}">
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
    <div class="modal fade user" id="addModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-1 border-white">
                <form action="add_admin_model" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">اضافة موديل</h5>
                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border-0">
                        <!-- Start Model -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label text-white">موديل جديد</label>
                            <div class="col-sm-8 col-md-9">
                                <input type="text" name="model" class="form-control" autocomplete="off" required="required" placeholder="اضف موديل جديد">
                            </div>
                        </div>
                        <!-- End Model -->
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">تراجع</button>
                        <input type="submit" class="btn btn-primary text-white" value="اضافة" />
                    </div>
                </form>
            </div>
        </div>
    </div>

           
@endsection
                