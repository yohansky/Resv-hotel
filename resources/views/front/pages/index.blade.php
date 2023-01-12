@extends('front.layouts.base')

@section('content')

	<!-- hod -->
	<!-- tels -->
	<div class="tels">
		<div class="container">
			@foreach ($type as $t)
			<div class="col-md-4 tels-left">
				<h4>{{ $t->name }}<span> {{$t->price}}</span></h4>
				@if ($t->image != "")
				<img src="/storage/{{$t->image}}" class="img-responsive" alt="">
				@else
				<img src="/assets/images/img404.png" class="img-responsive" alt="">
				@endif
				<div class="text" style="height: 180px; overflow: hidden;">
					<p >{{ $t->short_desc}}</p>
				</div>
				<a class="hvr-shutter-in-horizontal" href="{{route("room.show", $t->ID)}}">Book Now</a>
			</div>				
			@endforeach
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- tels -->
	
	<!-- quick -->
@endsection