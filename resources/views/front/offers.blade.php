@extends('front.layout.home')
@section('content')
    <section>
        <div class="auctions-bg offers-bg w-100 mt-5">

            <div class="d-flex  flex-wrap  auctions-bg-child ">
                <div></div>
                @if (session()->has('success'))
                <p class="message fs-5">{{ session()->get('success') }}</p>
                @endif
                <h1 class="fw-bolder  w-100 text-center active mb-5">
                    مستكشف المركبات
                </h1>
                <p class="w-100 text-center text-light mb-5">
                    هل تبحث عن سيارات بحالة معينة؟
                    <br>
                    تبسيط البحث عن طريق تحديد فئة لتضييق تطاق نتائجك
                </p>
                <form action="" class="w-100 d-flex flex-wrap auction-form">
                    <div class="w-75 d-flex justify-content-between flex-wrap mx-auto">

                        <div class="my-2 mx-auto">
                            <select id="mod" class="text-center py-1">
                                @foreach ($model as $mod)
                                    <option value="{{ $mod->model }}">{{ $mod->model }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select id="cate" class="text-center  py-1">
                                @foreach ($category as $cat)
                                    <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select id="coun" class="text-center  py-1">
                                @foreach ($cities as $cit)
                                    <option value="{{ $cit->city }}">{{ $cit->city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select id="type" class="text-center  py-1">

                                @foreach ($status as $status)
                                    @if ($status->status_car == 1)
                                        <option value="مستخدم">مستخدم</option>
                                    @elseif ($status->status_car != 1)
                                        <option value="جديد">جديد</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 mx-auto">
                            <select id="price" class="text-center py-1 d-flex">

                                <option value="اقل من 2000$">اقل من 2000$</option>
                                <option value="$2000 - $4000">$2000 - $4000</option>
                                <option class="$4000 - $7000">$4000 - $7000</option>
                                <option value="اكثر من 7000$">اكثر من 7000$</option>
                            </select>
                        </div>
                    </div>

                    <div class="w-100 d-flex justify-content-center">
                        <input type="submit" value="ابحث" class="py-1 px-5 my-3 contact text-light border-0">

                    </div>
                </form>

            </div>
        </div>
    </section>
    <section class="offers offers-page d-flex flex-column align-items-center pt-5 my-5 ">
        <h1 class="d-flex flex-wrap   yellow fs-3">العروض الحالية </h1>

        <div class="d-flex flex-wrap  col-12 col-lg-9 gap-1">

            @foreach ($Posts as $post)
                @if (!isset($post->auctions[0]->is_active))
                    @if ($post->is_active == 1 && $post->status_auction == 0 && $post->end_date >= date('Y-m-d'))
                        <div class="card animate text-light m-auto  py-0 mb-4 mt-4 " style="width: 20rem;">
                            <a href="{{ route('auctiondetails', $post->id) }}"><img src="/images/{{ $post->image }}"
                                    class="card-img-top p-3" height="220" alt="...">
                                <div style="position:absolute; left:20px;top:55%" class="bg-yellow p-1 px-2 text-light">
                                    <span class="mod">{{ $post->model }}</span>
                                    /{{ $post->category->name }}
                                    
                                </div>
                            </a>
                            <div class="card-body py-0">

                                <h5 class="card-title text-center"><span class="cate"></span>{{ $post->name }}
                                    /
                                    @if ($post->status_car == 1)
                                    مستخدم 
                                @else
                                     جديد
                                @endif
                                </h5>
                                <p class="text-center fs-7 card-details type">
                                   {{ $post->city }}
                                </p>

                            </div>
                            <div class="card-body d-flex justify-content-between py-0">
                                <p href="#" class="card-link card-details">سعر المزايدة/<span
                                        class="active price">{{ $post->starting_price }}</span><i
                                        class="active">$</i>
                                </p>
                                <a href="{{ route('auctiondetails', $post->id) }}"
                                    class="card-link active  fs-7">تفاصيل<i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>

                            </div>

                        </div>


                        <!--  the model   -->

                        <div class="modal fade user" id="auction{{ $post->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content  ">
                                    <form action="{{ route('bid_auction', $post->id) }}" method="post">
                                        @csrf
                                        <div class="modal-header bg-darkgrey">

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body bg-darkgrey ">
                                            @php
                                                $total = $post->starting_price + $post->auction_ceiling;
                                            @endphp
                                            <h2 class="text-white fs-4 p-3"> هل انت متاكد تريد المزايدة على السيارة بمبلغ
                                                <em class="yellow">{{ $total }}$</em>
                                            </h2>
                                        </div>
                                        <div class="modal-footer bg-darkergrey">
                                            <button type="button" class=" bg-lighter text-white fs-5"
                                                data-bs-dismiss="modal">تراجع</button>
                                            <input type="submit" class="btn bg-yellow text-white fs-5" value=" تاكيد  " />
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endif
                @endif
            @endforeach

        </div>


    </section>
    <section>
    </section>
    {{ $Posts->links('front.layout.paginate') }}
@endsection
