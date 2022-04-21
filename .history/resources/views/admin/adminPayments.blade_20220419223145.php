@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3 text-white">ادارة طرق الدفع</h1>
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <a href="adminPayments?do=Add" class="btn btn-sm bg-yellow">
            <i class="fa fa-plus"></i> اضافة طريقة الدفع
        </a>
        <div class="table-responsive text-white">
            <table class="main-table manage-members text-center table table-bordered  text-white">
                <tr >
                    <td class="text-warning">#ID</td>
                    <td class="text-warning">طريقة الدفع</td>
                    <td class="text-warning"> اسم البنك</td>
                    <td class="text-warning">التحكم</td>
                </tr>

                @foreach($Payments as $Payment)
                <tr>
                    <td>{{$Payment->id}}</td>
                    <td>{{$Payment->name}}</td>
                    <td>{{$Payment->bank_name}}</td>
                    <td>
                        <a href="adminPayments?do=Edit&Paymentid={{$Payment->id}}" class="btn btn-success">
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        {{-- <a href="" class='btn btn-danger' data-bs-toggle="modal" data-bs-target="#deletePayment{{$Payment->id}}">
                            <i class='fa fa-close'></i> Delete
                        </a> --}}
                        @if($Payment->is_active == 1)
                            <a href="" class='btn btn-info activate' data-bs-toggle="modal" data-bs-target="#activePayment{{$Payment->id}}">
                                <i class='fa fa-check'></i> Active
                            </a>
                        @else
                            <a href="" class='btn btn-danger activate' data-bs-toggle="modal" data-bs-target="#activePayment{{$Payment->id}}">
                                <i class='fa fa-close'></i> noActive
                            </a>
                        @endif
                        
                    </td>
                </tr>
                <div class="modal fade user" id="deletePayment{{$Payment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="delete_admin_Payment" method="post">
                                @csrf
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title " id="exampleModalLabel">حذف طريقة دفع</h5>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="Paymentid" value="{{$Payment->id}}">
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
                <div class="modal fade user" id="activePayment{{$Payment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-dark">
                            <form action="active_admin_Payment" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة طريقه الدفع</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="Paymentid" value="{{$Payment->id}}">
                                    <h2>هل انت متاكد</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">تراجع</button>
                                    <input type="submit" class="btn btn-primary" value="تعديل طريقة الدفع" />
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
<h1 class="text-center">Add New Payment</h1>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="add_admin_Payment" method="POST">
    @csrf
        <!-- Start Payment -->
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">طريقة دفع جديدة </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="Payment" class="form-control" autocomplete="off" placeholder=" اضف طريقة دفع">
            </div>
        </div>
                <div class="mb-3 row">
            <label class="col-sm-2 col-form-label text-white">اسم البنك   </label>
            <div class="col-sm-8 col-md-9">
                <input type="text" name="bank_name" class="form-control" autocomplete="off" placeholder="اسم البنك  ">
            </div>
        </div>
        <!-- End Payment -->
        <!-- Start Submit -->
        <div class="mb-2 row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="اضافة طريقة دفع'" class=" btn btn-primary ">
            </div>
        </div>
        <!-- End Submit -->
    </form>
</div>

@elseif($do == 'Edit')
<!-- start Edit model -->
{{$Paymentid = isset($_GET['Paymentid']) && is_numeric($_GET['Paymentid']) ? intval($_GET['Paymentid']) : 0;}}
<h1 class="text-center">Edit Modal</h1>
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach($Payments as $Payment)
        @if($Payment->id == $Paymentid)
            <form action="edit_admin_Payment" method="POST">
                @csrf
                <input type="hidden" name="Paymentid" value="{{$Paymentid}}">
                <!-- Start Payment -->
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white">طريقة الدفع  </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="Payment" value="{{$Payment->name}}" class="form-control input" autocomplete="off" placeholder="ادخل طريقة الدفع ">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label text-white"> اسم البنك  </label>
                    <div class="col-sm-8 col-md-9">
                        <input type="text" name="bank_name" value="{{$Payment->bank_name}}" class="form-control input" autocomplete="off" placeholder="ادخل اسم البنك">
                    </div>
                </div>  
                <!-- End Payment -->
                <!-- Start Submit -->
                <div class="mb-2 row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="submit" value="تعديل طريقة الدفع" class=" btn btn-primary ">
                    </div>
                </div>
                <!-- End Submit -->
                
            </form>
        @endif
    @endforeach
</div>
@endif
@endsection
                