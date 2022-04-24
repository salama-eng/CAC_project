@extends('client.layout.clientdashboard')
@section('content')
    <div class="profile-container d-flex flex-wrap g-5  align-items-center">

        <div class=" align-self-center col-lg-4 col-md-5 col-11 d-flex flex-column align-items-center">

            @if (isset($user->profile->avatar))
            <img src="assets/images/{{$user->profile->avatar}}" class="rounded-circle img-fluid " alt="{{$user->profile->avatar}}">
        @else
            <img src="assets/images/avatar.png" class="rounded-circle " alt="">


    @endif
           

            <p class="profilename fs-5 text-center col-lg-8 mt-4">  {{$user->name}} </p>
            <div class="col-8 d-flex justify-content-center gap-2 mt-2">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                <em class=" text-white mx-1 fs-5">8.8</em>
            </div>
            @if (isset($user->profile->user_id) == Auth::id())
            <a href="editprofile">
                <p style="background-color: var(--yellow);
                padding:0.8rem;
                margin-top:1rem;" class="prrofile"> تعديل المعلومات الشخصية </p>
            </a>
@else
<a href="complate_regester">
    <p class="prrofile"> اتمام عملية التسجيل </p>
</a>
@endif
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
                           {{$user->email}}
                        </td>
                    </tr>
                    <th>
                         كلمة السر
                    </th>
                    <td>
                      *********
                    </td>
                    
                </tr>
                    
            @if(isset($user->profile->user_id) == Auth::id())

                    <th>
                        رقم التلفون
                    </th>
                    <td>
                       {{$user->profile->phone}}
                    </td>
                    </tr>

                    <th>
                        العنوان
                    </th>
                    <td>
                        {{$user->profile->address}}
                    </td>
                    </tr>
                </table>
            </div>
           
   

            <h5 class=" mt-5 mb-5">معلومات الدفع </h5>

            <div>
                <table class="table-profile">
    
                    <tr>
                        <th>
                            طريقة الدفع
                        </th>
                        <td>
                           Visa
                        </td>
                    </tr>
    
    
                    <tr>
                        <th>
                            اسم البنك
                        </th>
                        <td>
                            paypal
                        </td>
                    </tr>
                    <tr>
                        <th>
                            رقم الحساب 
                        </th>
                        <td>
                          ***************
                        </td>
                    </tr>
                </table>
    
    
            </div>
    
    


           
        
        @else
       
<div class="alert alert-danger mt-5">
 
يجب عليك اتمام عملية تسجيل الدخول وادخال بيانات الدفع 
لاتمام العملية اضغط على زر اتمام عملية تسجيل الدخول
</div>
       

        @endif
  
      

        </div>




    </div>

   








@endsection
