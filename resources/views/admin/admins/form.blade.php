<div class="row">
	<div class="col-md-6">
		<label>First Name</label>
	  <input type="text" class="form-control" name="first_name" placeholder="First name">
	</div>
	<div class="col-md-6">
		<label>Last Name</label>
	  <input type="text" class="form-control" name="last_name" placeholder="Last name">
	</div>
	
</div>
<br/>
<div class="row">
	<div class="col-md-6">
		<label>Email</label>
		<input type="text" class="form-control" name="email" placeholder="email">
	  </div>
	  <div class="col-md-6">
		<label>Phone</label>
	  <input type="text" class="form-control" name="phone" placeholder="Phone No.">
	</div>
</div>
<br />
<div class="row">
	<div class="col-md-6">
		<label>Choose Unit</label>
		<select class="form-control select2" style="width:100%" name="units[]" required="" multiple="">
			@foreach($hubs as $hub)
				<option value="{{$hub->id}}">{{$hub->name}}</option> @endforeach
		</select>
	</div>
	<div class="col-md-6">
		<textarea class="form-control" rows="2" name="address" placeholder="Address"></textarea>
	  </div>
	{{-- <div class="col-md-4">
	  	<input type="file" class="form-control" name="image">
	</div> --}}
</div>

<br/>

{{-- <div class="row">
	<div class="col-md-12">
	  <textarea class="form-control" rows="2" name="address" placeholder="Address"></textarea>
	</div>
</div> --}}

<br/>

<div class="row">
	<div class="col-md-6">
	  <input type="password" class="form-control" name="password" placeholder="Password">
	</div>
	<div class="col-md-6">
	  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
	</div>
</div>
