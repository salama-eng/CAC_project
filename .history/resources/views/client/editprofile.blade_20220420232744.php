@extends('client.layout.clientdashboard')
@section('content')
    <div class="profile-container d-flex flex-wrap g-5  align-items-center">

        <div class=" align-self-center col-lg-4 col-md-5 col-11 d-flex flex-column align-items-center">
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

            <a href="editprofile">

                <p style="background-color: var(--yellow);
                padding:0.8rem;
                margin-top:1rem;" class="prrofile"> تعديل الصورة الشخصية</p>
            </a>

        </div>


        <div class=" col-lg-5 col-md-5 col-10 m-lg-0 m-auto text-white text-end">
            <h4 class="text-warning text-center fs-4  m-2">
                المعلومات الشخصية
            </h4>
            <h5 class=" mt-5">معلومات التواصل </h5>

            <div><form action="">
                <table class="table-profile table-editprofile ">


                    <tr>
                        <th>
                            البريد الالكتروني
                        </th>
                        <td>
                           <input type="text" value="fffffff">
                        </td>
                    </tr>
                    <th>


                      <tr>
                        <th>
                            كلمة السر
                        </th>
                        <td>
                           <input type="text" value="fffffff">
                        </td>
                    </tr>
                    <th>
                        رقم التلفون
                    </th>
                    <td>
                      <input type="text" value="fffffff">
                    </td>
                    </tr>

                    <th>
                        العنوان
                    </th>
                    <td>
                      <input type="text" value="fffffff">
                    </td>
                    </tr>
                </table>
            </div>
          
   

            <h5 class=" mt-5">معلومات الدفع </h5>

            <div>
                <table class="table-profile table-editprofile">
    
                    <tr>
                        <th>
                            طريقة الدفع
                        </th>
                        <td>
                          <input type="text" value="fffffff">
                        </td>
                    </tr>
    
    
                    <tr>
                        <th>
                            اسم البنك
                        </th>
                        <td>
                          <input type="text" value="fffffff">
                        </td>
                    </tr>
                    <tr>
                      <th>
                          رقم الحساب 
                      </th>
                      <td>
                        <input type="text" value="fffffff">
                      </td>
                  </tr>
    <tr>
       
    </tr>
                </table>
                 
     <input type="submit" name="submit" value="حفظ التعديلات"> 
            </div>
    
    

           
            
        
     

        </div>

     </form>



    </div>

   







@endsection
