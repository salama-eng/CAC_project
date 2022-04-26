@extends('client.layout.clientdashboard')
@section('content')



    @if ($do == 'Manage')
        <div class="profile-container d-flex flex-wrap g-5  align-items-center">

            <div class=" align-self-center col-lg-4 col-md-5 col-11 d-flex flex-column align-items-center">
                @if (isset($user->profile->avatar))
                    <img src="assets/images/{{ $user->profile->avatar }}" class="rounded-circle " alt="">
                @else
                    <img src="assets/images/avatar.png" class="rounded-circle " alt="">
                @endif
                <p class="profilename fs-5 text-center col-lg-8 mt-4"> {{ $user->name }} </p>
                <div class="col-8 d-flex justify-content-center gap-2 mt-2">

                    <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                    <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                    <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                    <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                    <img src="assets/icons/star.png" class="" width="20" height="20" alt="">
                    <em class=" text-white mx-1 fs-5">8.8</em>
                </div>
                <a href="editprofile?do=Edit&">

                    <p style="background-color: var(--yellow);
                        padding:0.8rem;
                        margin-top:1rem;" class="prrofile"> تعديل الصورة الشخصية</p>
                </a>

            </div>


            <div class=" col-lg-5 col-md-5 col-10 m-lg-0 m-auto text-white text-end">
                <h4 class="text-warning text-center fs-4  m-2">
                    المعلومات الشخصية
                </h4>
                <h5 class=" mt-4 mb-3">معلومات التواصل </h5>

                <div>
                    <form action="save_editprofile" method="post">
                    @csrf
                        <table class="table-profile table-editprofile ">


                            <tr>
                                <th>
                                    اسم المستخدم
                                </th>
                                <td>
                                    <input type="text" name="name" value="{{ $user->name }} ">
                                    @error('name')
                                        <span class="text-end yellow">* {{ $message }}  </span>
                                    @enderror
                                    <input type="hidden" name="image" value="{{ $user->profile->image }} ">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    البريد الالكتروني
                                </th>
                                <td>
                                    <input type="text" name="email" value="{{ $user->email }}">
                                    @error('email')
                                        <span class="text-end yellow">* {{ $message }}  </span>
                                    @enderror
                                </td>
                            </tr>
                            <th>
                                رقم التلفون
                            </th>
                            <td>
                                <input type="text" name="phone" value="{{ $user->profile->phone }}">
                                @error('phone')
                                    <span class="text-end yellow">* {{ $message }}  </span>
                                @enderror
                            </td>
                            </tr>

                            <th>
                                العنوان
                            </th>
                            <td>
                                <input type="text" name="address" value=" {{ $user->profile->address }}">
                                @error('address')
                                    <span class="text-end yellow">* {{ $message }}  </span>
                                @enderror
                            </td>
                            </tr>

                        </table>
                </div>



                <h5 class=" mt-5">معلومات الدفع </h5>

                <div>
                    <table class="table-profile table-editprofile">
                        <tr>
                            <th>
                                رقم الحساب
                            </th>
                            <td>
                                <input type="text" name="card" value="  {{ $acount }} ">
                                @error('card')
                                    <span class="text-end yellow">* {{ $message }}  </span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" class="btn btn-primary bg-yellow" value="حفظ التعديلات">
                            </td>

                        </tr>
                    </table>


                </div>


            </div>

            </form>



        </div>
    @elseif($do == 'Edit')
        <div class=" col-lg-5 col-11 m-auto edite-container p-2">
            <h5 class=" mt-5 mb-5 text-white"> تعديل الصورة </h5>
            <form action="edit_image_profile" method="post" enctype="multipart/form-data">
                @csrf
                <input class="image m-auto w-100" type="file" name="image">
                <input type="submit" value="حفظ" class="image bg-yellow mt-4 mb-4 w-100 " type="file" name="image">
                @error('image')
                    <span class="text-end yellow">* {{ $message }}  </span>
                @enderror
            </form>
        </div>
    @endif
@endsection
