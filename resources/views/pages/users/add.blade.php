@extends ('layouts.master')

@section ('content')
	<div class="containter">
		<div class="row">
			<div class="col mt-5 ">
				<h4 class="text-center text-primary">Add User</h4>
				<div class="col-12 col-sm-10 col-md-8 ml-auto mr-auto border pt-4 pb-4">
					<p class="text-center text-dark">Enter the user's information below</p>
					<form>
						<div class="row">
							<div class="col-12 col-md-6 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="First name" name="firstName">
							</div>
							<div class="col-12 col-md-6  mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Last name" name="lastName">
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Email Address" name="email">
							</div>
							<div class="col-12 col-md-6 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Phone e.g. (08092238281)" name="phoneNumber">
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-md-6 mt-2 mb-2">
								<input type="text" class="form-control" placeholder="Username" name="username">
							</div>
							<div class="col-12 col-md-6 mt-2 mb-2">
								<input type="password" class="form-control" name="password" placeholder="password">
							</div>
						</div>
						<div class="row">
							<div class="col text-center mt-4">
								<button class="btn btn-success float-right  pl-5 pr-5">Submit</button>
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