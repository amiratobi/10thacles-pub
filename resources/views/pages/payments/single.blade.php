@extends ('layouts.master')

@section ('content')
		<div class="col-6 card ml-auto mr-auto rrr-display-card border border-info">
			@if ($response)
				<h1 class="text-center">RRR: {{ $response->data->RRR }}</h1>
				<table class="table mt-3">
					<tbody>
						<tr>
							<td>Cashier Name:</td>
							<td>{{$name}}</td>
						</tr>
						<tr>
							<td>Amount:</td>
							<td><del>N</del>{{number_format($response->amount, 2)}}</td>
						</tr>
						<tr>
							<td>Status:</td>
							<td>{{ $response->status }}</td>
						</tr>
					</tbody>
				</table>
			@endif
		</div>
@endsection

@section ('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.nav-link').removeClass('active');
			$('#payments-navlink').addClass('active');
		});
	</script>
@endsection