@extends ('layouts.master')

@section ('content')
	<div class="col-10 ml-auto mr-auto border mt-3">
		<div class="col text-center">
			<a href="{{ url(route('payment.rrr')) }}"><button class="btn btn-primary mt-2 mb-2">Generate one RRR for All Cashiers</button></a>
		</div>
		<table class="table">
			<thead class="bg-secondary text-light font-weight-bold">
				<tr>
					<td>Cashier Name</td>
					<td>Amount Pending</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach ($cashiers as $cashier)
					<tr>
						<td>{{ $cashier->cashier->username }}</td>
						<td><del>N</del>{{ number_format($cashier->total, 2) }}</td>
						<td><a href="/payment/rrr/{{ $cashier->_id }}"><button class="btn btn-sm btn-info">Generate RRR</button></a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
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