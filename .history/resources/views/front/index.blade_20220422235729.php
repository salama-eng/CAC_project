
@extends('front.layout.home')
@section('content')

    <section class="">
   
<div class="landscape g-4 d-flex flex-wrap ">
      

     
<div class="landscape-text col-lg-5  d-flex  p-lg-5 m-lg-5 ">

  <h1 class=" col-lg-11 ">شركة كاك مزاد </h1>
  <h3 class="text-white col-lg-11">لجميع السيارات والشاحنات المستعملة والجديدة تجعل من السهل على الاعضاء العثور والمزايدة على جميع السيارات </h3>


 <div class=" col-lg-11 ><a href="" class="btn-yellow  "> ابدا التصفح </a></div> 

</div>

<div class="landscape-image col-8  ">
  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
              <img src="/images/slider1.jpg" class="d-block w-100" alt="...">
           
          </div>
          <div class="carousel-item" data-bs-interval="2000">
              <img src="/images/slider2.jpg" class="d-block w-100" alt="...">
             
          </div>
          <div class="carousel-item">
              <img src="/images/slider3.jpg" class="d-block w-100" alt="...">
              
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
  </div>

</div>



</div>
    </section>

    @endsection