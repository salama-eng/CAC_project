@extends('admin.layout.dashboard')
@section('content')


<section>
  <div class="dash-header col-11 m-auto">

 
<div class="dash-header1">
<p class="fs-4">مرحبا!! {{Auth::user()->name}} </p>

</div>
 </div>

</section>


@endsection
                