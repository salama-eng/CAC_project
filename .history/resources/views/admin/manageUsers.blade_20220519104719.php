@extends('admin.layout.dashboard')
@section('content')

    @if ($do == 'Manage')
        <h1 class="text-center fs-3  text-white mt-4">ادارة المستخدمين</h1>
        <div class="col-lg-4 col-8 mx-auto mb-5 mt-0">
            <span class="fa fa-search text-light"></span>
            <input type="text" placeholder="ابحث عن المستخدم" class="search-input w-100 px-5 text-light">
        </div>
        <div class="container container-for-input">
            @if (session()->has('success'))
                <div class="alert alert-success message">
                    {{ session()->get('success') }}
                </div>
            @endif
<style>
.table
{
  
  border: none;
  background-color: #222121 !important;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px;
}
.table tr td {
    border: none;
    border-bottom:1px solid rgb(63, 63, 63);
}
.table tr  {
    border: none;

}

.table th  {
    border: none;
    padding:1rem;
    background-color: rgb(30, 30, 30);
}

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

                            <td>

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
