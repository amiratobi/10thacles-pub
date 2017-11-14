@extends ('layouts.master')

@section ('content')
		<div class="col-6 card ml-auto mr-auto rrr-display-card border border-info">
			@if ($remitaResponse)
				<h1 class="text-center">RRR: {{ $remitaResponse->RRR }}</h1>
				<table class="table mt-3">
					<tbody>
						<tr>
							<td>Cashier Name:</td>
							<td>{{$selectedTeller->name}}</td>
						</tr>
						<tr>
							<td>Cashier Email:</td>
							<td>{{$selectedTeller->email}}</td>
						</tr>
						<tr>
							<td>Amount:</td>
							<td><del>N</del>{{number_format($selectedTeller->pending_cash, 2)}}</td>
						</tr>
						<tr>
							<td>Status:</td>
							<td>{{ $remitaResponse->status }}</td>
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