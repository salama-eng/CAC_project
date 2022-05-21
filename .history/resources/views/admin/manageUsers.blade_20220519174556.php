@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
    <style>
.search{
    border: none !important;
  background-color: #222121 !important;
  box-shadow: rgba(1, 1, 1, 0.16) 0px 3px 6px 5px;
}
.input-span
{
    background-color: #838383 !important;
    padding: 1rem;;
}

@import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


       body{
        background-color:#eee;
        font-family: "Poppins", sans-serif;
        font-weight: 300;
       }

       .height{
        height: 100vh;
       }
       

       .search{
       position: relative;
       box-shadow: 0 0 40px rgba(51, 51, 51, .1);
         
       }

       .search input{

        height: 60px;
        text-indent: 25px;
        border: 2px solid #d6d4d4;


       }


       .search input:focus{

        box-shadow: none;
        border: 2px solid blue;


       }

       .search .fa-search{

        position: absolute;
        top: 20px;
        left: 16px;

       }

       .search button{

        position: absolute;
        top: 5px;
        right: 5px;
        height: 50px;
        width: 110px;
        background: blue;

       }
    </style>




    <div class="row height d-flex justify-content-center align-items-center">

      <div class="col-md-8">

        <div class="search">
          <i class="fa fa-search"></i>
          <input type="text" class="form-control" placeholder="Have a question? Ask Now">
          <button class="btn btn-primary">Search</button>
        </div>
        
      </div>
      
    </div>

        <h1 class="text-center fs-3  text-white mt-4">ادارة المستخدمين</h1>
        <div class="col-lg-4 col-8 mx-auto mb-5 mt-0">
            
            <span class="fa fa-search text-light input-span"></span>
            <input  type="text" placeholder="ابحث عن المستخدم" class="search-input search w-100 px-5 text-light">
        </div>
        <div class="container container-for-input">
            @if (session()->has('success'))
                <div class="alert alert-success message">
                    {{ session()->get('success') }}
                </div>
            @endif
<style>


</style>
            <div class=" table table-responsive text-white ms-5">
                <table class="main-table manage-members text-center  table  text-white">
                    <tr class="text-warning ">
                        <th class="text-warning">#ID</th>
                        <th class="text-warning">اسم المستخدم</th>
                        <th class="text-warning">الايميل</th>
                        <th class="text-warning">الهاتف</th>
                        <th class="text-warning">العنوان</th>
                        <th class="text-warning">معلومات المحفضة</th>
                        <th class="text-warning">التحكم</th>
                    </tr>
                    <?php $i = 1; ?>
                    @foreach ($user as $user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="u-name">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            @if (isset($user->profile->user_id) == Auth::id())
                                <td>{{ $user->profile->phone }}</td>
                                <td>{{ $user->profile->address }}</td>
                            @else
                                <td class="redd ">لم يتم ادخال بيانات البروفايل</td>
                                <td class="redd">لم يتم ادخال بيانات البروفايل</td>
                            @endif

                            <td>
                                <a href="{{ route('wallet', $user->id) }}" class="card-link active text-center mt-5 mb-2">
                                    المحفضة <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                            </td>

                            <td >

                                @if ($user->is_active == 1)
                                    <label class="switch" data-bs-toggle="modal"
                                        data-bs-target="#activeuser{{ $user->id }}">
                                        <input type="checkbox" checked>
                                        <span class="slider"></span>
                                    </label>
                                @else
                                    <label class="switch" data-bs-toggle="modal"
                                        data-bs-target="#activeuser{{ $user->id }}">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                @endif

                            </td>
                        </tr>

                        <div class="modal fade user" id="activeuser{{ $user->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content bg-grey">
                                    <form action="active_admin_user" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">حالة المستخدم</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="userid" value="{{ $user->id }}">
                                            <h2>هل انت متاكد</h2>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class=" bg-lighter text-white fs-5"
                                                data-bs-dismiss="modal">تراجع</button>
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
    @endif
@endsection
