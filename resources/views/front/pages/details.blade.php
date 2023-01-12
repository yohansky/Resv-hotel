@extends('front.layouts.base')

@section('content')
	
    <!-- details -->
	<div class="details">
		<div class="container">
			<div class="col-md-7 details-left">
				@if ($type[0]->image != "")
				<img src="{{$type[0]->image}}" class="img-responsive" alt="">
				@else
				<img src="/assets/images/img404.png" class="img-responsive" alt="">
				@endif
			</div>
			<div class="col-md-5 details-right">
				<span><strong>Rp.{{$type[0]->price}}</strong></span>
				@foreach ($type[0]->perks as $perk)
				<li>{{$perk}}</li>
				@endforeach
				<p>{{ $type[0]->short_desc}}</p>
			</div>
			<div class="clearfix"> </div>
			<div class="details-top">
				{{ $type[0]->details}}
			</div>
			<div class="booking-form">
				@if (Session::has("notif"))
				<div class="alert alert-success" role="alert">
					{{Session::get("notif")}}
				  </div>
				@elseif (Session::has("error"))
				<div class="alert alert-danger" role="alert">
					{{Session::get("error")}}
				  </div>
				@endif
				<form action="{{route("transaction.create")}}" method="POST">
					@method("POST")
					@csrf
					<div class="col-md-6">			 
						<input name="price" value="{{$type[0]->price}}" type="hidden">
						<input name="tipe" value="{{$type[0]->name}}" type="hidden">
						<h5>NAMA</h5>
						<input type="text" name="Name" value="" required>
						<h5>E-MAIL</h5>
						<input type="text" name="Email" value="" required>
						<h5>NO. TELEPHONE</h5>
						<input type="text" name="Phone" value="" required>
					</div>
						<div class="col-md-6">		
					
							<h5>CHECK IN</h5>
								<select class="arrival" name="tgl-in">
									 @for ($i = 1; $i < 31; $i++)
										@if ($i < 10)
										<option value="{{ "0".$i }}">{{ "0".$i }}</option>
										@else
										<option value="{{ $i }}">{{ $i }}</option>
										 @endif
									 @endfor				 
								 </select>
								 <select class="arrival" name="bln-in">
									 <option value="01">Jan</option>
									 <option value="02">Feb</option>
									 <option value="03">Mar</option>
									 <option value="04">Apr</option>
									 <option value="05">May</option>
									 <option value="06">June</option>
									 <option value="07">July</option>
									 <option value="08">Aug</option>
									 <option value="09">Sep</option>
									 <option value="10">Oct</option>
									 <option value="11">Nov</option>					 
									 <option value="12">Dec</option>
								 </select>
								 <select class="arrival" name="thn-in">
									<option>2015</option>
									<option>2016</option>
									<option>2017</option>
									<option>2018</option>
									<option>2019</option>
									<option>2020</option>
									<option>2021</option>
								 </select>
							<h5>CHECK OUT</h5>
								 <select class="arrival" name="tgl-out"> 
									@for ($i = 1; $i < 31; $i++)
									@if ($i < 10)
									<option value="{{ "0".$i }}">{{ "0".$i }}</option>
									@else
									<option value="{{ $i }}">{{ $i }}</option>
									 @endif
								 @endfor						 
								 </select>
								 <select class="arrival" name="bln-out">
									<option value="01">Jan</option>
									<option value="02">Feb</option>
									<option value="03">Mar</option>
									<option value="04">Apr</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">Aug</option>
									<option value="09">Sep</option>
									<option value="10">Oct</option>
									<option value="11">Nov</option>					 
									<option value="12">Dec</option>
								 </select>
								 <select class="arrival" name="thn-out">
									<option>2015</option>
									<option>2016</option>
									<option>2017</option>
									<option>2018</option>
									<option>2019</option>
									<option>2020</option>
									<option>2021</option>
								 </select>

					 <h5 class="mem">MEMBERS</h5>
					 <input min="1" type="number" id="quantity" name="Members" value="1" class="form-control input-small">
					 <h5>REQUIRED</h5>
					 <textarea name="Required" value=""></textarea>
					 <input type="submit" value="Submit">
					 <input type="reset" value="Reset">
									  
				 </div>
					</form>
				
				

			</div>
		 </div>
	</div>
<!-- details -->
@endsection