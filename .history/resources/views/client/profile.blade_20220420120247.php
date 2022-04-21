@extends('client.layout.clientdashboard')
@section('content')
    <div class="profile-container d-flex flex-wrap g-5  align-items-center">

        <div class=" align-self-end col-lg-4 col-md-5 col-11 d-flex flex-column align-items-center">
            <img src="assets/images/avatar.png" class="rounded-circle " alt="">
            <p class="profilename fs-5 text-center col-lg-8 mt-4">جاك سبارو </p>
            <div class="col-8 d-flex justify-content-center gap-2 mt-2">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <em class=" text-white mx-1 fs-5">8.8</em>
            </div>

            <a href="editeprofile?do=Edit&id={{1}}">
                <p class="editeprofile"> تعديل المعلومات الشخصية </p>
            </a>

        </div>


        <div class=" col-lg-5 col-md-5 col-11 m-lg-0 m-auto text-white text-end">
            <h4 class="text-warning text-center fs-4  m-2">
                المعلومات الشخصية
            </h4>
            <h5 class=" mt-5">معلومات التواصل </h5>

            <div>
                <table class="table-profile">

                    <tr>
                        <th>
                            البريد الالكتروني
                        </th>
                        <td>
                            admin@gmail.com
                        </td>
                    </tr>
                    <th>
                        رقم التلفون
                    </th>
                    <td>
                        +887 7007 7877
                    </td>
                    </tr>

                    <th>
                        العنوان
                    </th>
                    <td>
                        صنعاء التحرير
                    </td>
                    </tr>
                </table>
            </div>
            @foreach ( $Payment as $Payment )
   
            @if (isset($Payment->name))


            <h5 class=" mt-5">معلومات الدفع </h5>

            <div>
                <table class="table-profile">
    
                    <tr>
                        <th>
                            طريقة الدفع
                        </th>
                        <td>
                            admin@gmail.com
                        </td>
                    </tr>
    
    
                    <tr>
                        <th>
                            اسم البنك
                        </th>
                        <td>
                            admin@gmail.com
                        </td>
                    </tr>
    
                </table>
    
    
            </div>
    
    


            {{$Payment->name}}
        
        @else
       

       

        @endif
        @endforeach
      

        </div>




    </div>

   




    @if($do == 'Edit')
    <!-- start Edit model -->
    {{-- {{$categoryid = isset($_GET['categoryid']) && is_numeric($_GET['categoryid']) ? intval($_GET['categoryid']) : 0;}} --}}
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
        @foreach($payment as $pay)
            @if($pay->id == 1)
                <form action="{{ route('edit_profile',$id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="" value="{{$id}}">
                    <!-- Start Payment -->
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-white"> اسم الصنف   </label>
                        <div class="col-sm-8 col-md-9">
                            <input type="text" name="name" value="" class="form-control" autocomplete="off" placeholder="ادخل طريقة الدفع ">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-white"> صورة الصنف  </label>
                        <div class="col-sm-8 col-md-9">
                            <input type="file" name="image" value="" class="form-control" autocomplete="off" placeholder="ادخل اسم البنك">
                            <input type="hidden" name="image_old" value="" class="form-control" autocomplete="off" placeholder="ادخل اسم البنك">
                        </div>
                    </div> 
                    <div class="form-check d-flex  justify-content-center mt-5 ">
             
                        <input class="form-check-input col-7" type="checkbox" id="blankCheckbox" name="active" value="1" aria-label="...">
                        <label class="col-6 mx-5 text-white" for="">تفعيل</label>    </div> 
                    <!-- End Payment -->
                    <!-- Start Submit -->
                    <div class="mb-2 row">
                        <div class="offset-sm-2 col-sm-10">
                            <input type="submit" value="تعديل التصنيف  " class=" btn btn-primary ">
                        </div>
                    </div>
                    <!-- End Submit -->
                    
                </form>
            @endif
        @endforeach
    </div>
    @endif







@endsection
