@extends ('layouts.master')

@section ('content')
	<div class="containter">
		<div class="row">
			<div class="col mt-2">
				<h2 class="text-center display-4 text-dark">Add User</h2>

				<div class="col-12 col-sm-8 col-md-6 ml-auto mr-auto border pt-4 pb-4 add-user-form-cont rounded">
					<div class="alert-success text-center">@include('partials.alerts')</div>	
					<br>				
					<p class="text-center text-dark">Enter the user's information below</p>
					<form method="POST" action="{{ url(route('user.store')) }}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-12 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="First name" name="firstName">
							</div>
							<div class="col-12 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Last name" name="lastName">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-12 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Email Address" name="email">
							</div>
							<div class="col-12 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Phone e.g. (08092238281)" name="phoneNumber">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-12 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Username" name="username">
							</div>
							<div class="col-12 mt-2 mb-2">
								<input type="password" class="form-control" name="password" placeholder="password">
							</div>
							<div class="col-12 mt-2 mb-2">
								<select name="roles[]" id="" class="form-control" required>
									<option value="" selected disabled>Select Role</option>
									@foreach ($roles as $key => $value)
										<option value="{{$value}}">{{$key}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col text-center mt-2">
								<button class="btn btn-success float-right pl-5 pr-5">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section ('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.nav-link').removeClass('active');
        	$('#users-navlink').addClass('active');
		});
	</script>
@endsection