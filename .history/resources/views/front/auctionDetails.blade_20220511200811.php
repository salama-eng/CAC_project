@extends('front.layout.home')
@section('content')
    <style>
        p {
            border-bottom: 0.5px solid rgb(49, 49, 49);
            width: 70%;
            padding: 2px;
        }

    </style>
    </div>
    <section class="d-flex container mt-5 flex-wrap col-lg-9">
        <section class="col-12  col-lg-6 mt-5">
            <a href="" class="d-flex card-details fs-6 mb-1"><span class="fa fa-long-arrow-right pt-2 px-2"></span>رجوع</a>
            <div class="mt-1 mb-2">
                <h3 class="active mb-4"><span class="card-details fs-6"> السعر الاولي/</span>
                    {{ $post->starting_price }}$
                </h3>

                <div class="d-flex flex-wrap">
                    <div class="col-6 col-lg-4">

                        <p class="card-details mb-1 fw-bold">العنوان</p>
                        <p class="card-details mb-1 fw-bold">الموديل</p>
                        <p class="card-details mb-1 fw-bold">الماركة</p>
                        <p class="card-details mb-5 fw-bold">اللون</p>
                        <p class="card-details mb-1 fw-bold">المحرك</p>
                        <p class="card-details mb-1 fw-bold">الضرر</p>
                        <p class="card-details mb-1 fw-bold">حالة السيارة</p>
                        <p class="card-details mb-1 fw-bold">تاريخ انتهاء المزاد</p>
                        <p class="card-details mb-1 fw-bold"> الوصف</p>

                    </div>
                    <div class="col-6 col-lg-8">
                        <p class="mb-1 text-light ">{{ $post->address }}</p>
                        <p class="mb-1 text-light ">{{ $post->model }}</p>
                        <p class="mb-1 text-light ">{{ $post->category->name }}</p>
                        <p class="mb-5 text-light ">{{ $post->color }}</p>
                        <p class="mb-1 text-light ">{{ $post->engin_car }}</p>
                        @if ($post->damage == 1)
                            <p class="mb-1 text-light ">لايوجد ضرر</p>
                        @elseif ($post->damage == 2)
                            <p class="mb-1 text-light ">ضرر سطحي</p>
                        @else
                            <p class="mb-1 text-light ">ضرر ثانوي</p>
                        @endif
                        @if ($post->status_car == 1)
                            <p class="mb-1 text-light ">جديد</p>
                        @else
                            <p class="mb-1 text-light ">مستخدم</p>
                        @endif

                        <p class="mb-1 text-light ">{{ $post->end_date }}</p>
                        <p class="mb-1 text-light "> {{ $post->description }}</p>

                    </div>

                    <div class=" ">
                        <form action="{{ route('bid_auction', $post->id) }}" method="post">
                            @csrf

                            <div class="modal-body bg-darkgrey  p-3  ">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul style="list-style: none">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-around align-items-center mt-5">
                                    @if (isset($post->auctions->bid_total))
                                        <div>
                                            <h2 class="text-white fs-6 ">
                                                مبلغ المزايدة سيكون اكثر من <em
                                                    class="yellow">{{ $post->auctions->max('bid_total') + $post->auction_ceiling }}$</em>
                                            </h2>
                                        </div>
                                    @else
                                        <div>
                                            <h2 class="text-white fs-6">
                                                مبلغ المزايدة سيكون اكثر من <em
                                                    class="yellow">{{ $post->starting_price + $post->auction_ceiling }}$</em>
                                            </h2>
                                        </div>
                                    @endif
                                    <div class="d-flex  align-items-center gap-3 ">
                                        <h3 class="text-white fs-6"> </h3>
                                        <input type="number" class="input-model text-white p-2"
                                            min="{{ $post->auction_ceiling }}" {{-- step="{{ $post->auction_ceiling }}" --}} value=""
                                            name="amount" placeholder="مقدار الزيادة" />
                                    </div>
                                </div>
                                @php
                                    $discount = 0.2 * $post->starting_price;
                                @endphp
                                <h3 class="yellow fs-7 mt-2">*يجب ان تكون مقدار الزيادة من مضاعفات
                                    {{ $post->auction_ceiling }}$</h3>
                                <h3 class="yellow fs-7 mt-2">*سيتم خصم من حسابك مبلغ وقدرة
                                    {{ $discount }}$ حتى انتهاء العملية </h3>
                                <input type="hidden" name="discount" value="{{ $discount }}">
                            </div>

                            @if ($post->end_date >= now() && Auth::id() != 3 && $post->users->id != Auth::id())
                                <button class=" contact text-light btn rounded-0 col-6 mt-4 ">
                                    مزايدة
                                </button>
                            @endif
                        </form>

                    </div>




                </div>
            </div>
        </section>
        <section class="col-lg-6 col-sm-12 mt-5">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <div>

                    @if (isset($post->auctions[0]->bid_total))
                        <h5 class="active "> <span class="card-details fs-6"> السعر الحالي/ </span>
                            {{ $post->auctions->max('bid_total') }}$
                        </h5>
                    @else
                        <h3 class="active fs-5"> <span class="card-details fs-5"> السعر الحالي/ </span>
                            {{ $post->starting_price }}$
                        </h3>
                    @endif
                </div>
                <h3 class="text-light fw-bold ">{{ $post->name }}/ <span>{{ $post->model }}</span></h3>

            </div>


            <div id="carouselExampleControls" class="carousel slide col-12 mt-3" data-bs-ride="carousel">
                <div class="carousel-inner main-img-div w-100">
                    <div class="carousel-item active w-100">
                        <img src="/images/{{ $post->image }}" class="d-block w-100 h-100 main-img"
                            alt="{{ $post->image }}">

                    </div>

                </div>

                <div class="col-lg-12 col-sm-12 d-flex flex-wrap justify-content-center align-items-center">


                    @php
                        $images = json_decode($post->multiple_image, true);
                        
                    @endphp


                    @foreach ($images as $image)
                        <div class="img-responsive">
                            <img src="{{ URL::to('/images/' . $image) }}" class="img-fluid" alt="{{ $image }}">
                        </div>
                    @endforeach
                    <div class="img-responsive">
                        <img src="{{ URL::to('/images/' . $post->image) }}" class="img-fluid" alt="...">
                    </div>


                </div>

        </section>

    </section>

@endsection
