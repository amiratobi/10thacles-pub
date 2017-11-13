@extends ('layouts.master')

@section ('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="d-flex flex-row justify-content-center">
					<a href="/users/add"><button class="btn btn-sm btn-primary">Add User</button></a>
				</div>
				<div class="d-flex flex-row justify-content-center">
					<div>
						<table class="table table-responsive table-hover" id="user-table">
							<thead class="bg-dark text-light">
								<tr>
									<th>SN</th>
									<th>Name</th>
									<th>Email</th>
									<th>Role</th>
									<th>Date Created</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $user->name }}</td>
										<td>{{ $user->email }}</td>
										<td>{{ $user->role }}</td>
										<td>{{ $user->created_date }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
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
        	$('#user-table').DataTable();
		});
	</script>
@endsection