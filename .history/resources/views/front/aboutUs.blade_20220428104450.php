@extends('front.layout.home')
@section('content')


<main class=" main-contact d-flex justify-content-center align-items-center mt-5 ">
    <div class="overlay"></div>
    <div class="text container aboutheader ">
        <h1 class="  yellow mb-5 fw-bold "> شركة مزاد كاك</h1>
        <p class=" col-lg-9 col-11 mb-5">شركة مزاد تأسست في 1982 بواسطة ويليس ج. جونسون، وبدأت كساحة واحدة في كاليفورنيا. 
            الآن يقع المقر الرئيسي في دالاس، تكساس، تعد كوبارت الشركة الرائدة على مستوى العالم في مزادات السيارات على الإنترنت، ووجهة رئيسية لإعادة بيع وإعادة تسويق السيارات. تقنية كوبارت المبتكرة ومنصة المزادات على الإنترنت تربط بين البائعين و لمشترين حول العالم. كوبارت تقوم بتشغيل أكثر من 200 موقع 
            في 11 بلد، وأكثر من 150,000 سيارة للمزاد كل يوم.

        </p>
        <a href="{{route('contact_us')}}" class=" border1 text-center mb-2 px-3 py-2 mt-5"> تواصل معنا  <i class="fa fa-long-arrow-left p-2 pt-1"> </i></a>
    </div>
</main>



@endsection