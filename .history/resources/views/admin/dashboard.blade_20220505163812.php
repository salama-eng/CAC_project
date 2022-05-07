@extends('admin.layout.dashboard')
@section('content')


<section>
  <div class="dash-header col-11 m-auto">

 
<div class="dash-header1">
<p> {{Auth::user()->name}مرحبا </p>

</div>
 </div>

</section>


@endsection
                