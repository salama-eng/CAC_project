@extends('admin.layout.dashboard')
@section('content')

@if($do == 'Manage')

<h1 class="text-center fs-3  text-white">ادارة المستخدمين</h1>
    <div class="container container-for-input">
        @if(session()->has('success'))
            <div class="alert alert-success message">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="table-responsive text-white ms-5">
            <table class="main-table manage-members text-center  table table-bordered  text-white">
                <tr class="text-warning " >
                    <td  class="text-warning">#ID</td>
                    <td class="text-warning">اسم المستخدم</td>
                    <td class="text-warning">الايميل</td>
                    <td class="text-warning">الهاتف</td>
                    <td class="text-warning">العنوان</td>
                    <td class="text-warning">معلومات المحفضة</td>
                    <td class="text-warning">التحكم</td>
                </tr>
                <?php $i = 1?>
                @foreach($user as $user)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    @if (isset($user->profile->user_id) == Auth::id())
                    <td>{{$user->profile->phone}}</td>
                    <td>{{$user->profile->address}}</td>
                @else
                <td class="text-warning">لم يتم ادخال بيانات البروفايل</td>
                <td class="text-warning">لم يتم ادخال بيانات البروفايل</td>
                
                @endif

                <td>
                    <a href="{{route('wallet',$user->id)}}" class="card-link active text-center mt-5 mb-2"> تفاصيل المزاد <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
                </td>
                    
                    <td>
                        
                        @if($user->is_active == 1)
                         
                            <label class="switch" data-bs-toggle="modal" data-bs-target="#activeuser{{$user->id}}">
                                <input type="checkbox" checked>
                                <span class="slider"></span>
                              </label>
                        @else
                           
                            <label class="switch" data-bs-toggle="modal" data-bs-target="#activeuser{{$user->id}}">
                                <input type="checkbox">
                                <span class="slider"></span>
                              </label>
                        @endif
                        
                    </td>
                </tr>

                <div class="modal fade user" id="activeuser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content bg-grey">
                            <form action="active_admin_user" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حالة المستخدم</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="userid" value="{{$user->id}}">
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

@endif
@endsection
                