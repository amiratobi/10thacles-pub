@extends ('layouts.master')

@section ('content')
	<div class="container">
		<div class="row">
			<div class="col-12 pt-5">
				<div class="d-flex flex-row">
					<div class="col-11 mt-2 mb-2">
						<a href="{{ url(route("user.create")) }}"><button class="btn btn-success float-right"><i class="fa fa-plus"></i> Add User</button></a>
					</div>
				</div>
				<div class="d-flex flex-row justify-content-center">
					<div class="col-12 col-md-10 ml-auto mr-auto">
						<table class="table table-responsive-md table-hover" id="user-table">
							<thead class="bg-dark text-light">
								<tr>
									<th>SN</th>
									<th>Username</th>
									<th>Organization</th>
									<th>Role</th>
									{{-- <th>Date Created</th> --}}
								</tr>
							</thead>
							<tbody>
								@foreach ($users as $user)
									<tr class="ml-2">
										<td>{{ $loop->iteration }}</td>
										<td>{{ $user->username }}</td>
										<td>{{ $user->domain or "" }}</td>
										<td>{{ $user->roles[0]->name }}</td>
										{{-- <td>{{ $user->created_date }}</td> --}}
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