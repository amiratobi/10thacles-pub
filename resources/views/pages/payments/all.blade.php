@extends ('layouts.master')

@section ('content')
		<div class="col-6 card ml-auto mr-auto rrr-display-card border border-info">
			<h1 class="text-center">RRR: {{ $remitaResponse->RRR }}</h1>
			<table class="table mt-3">
				<tbody>
					<tr>
						<th colspan="2">Payment for all Cashiers</th>
					</tr>
					<tr>
						<td>Amount:</td>
						<td><del>N</del>{{number_format($totalAmount, 2)}}</td>
					</tr>
					<tr>
						<td>Status:</td>
						<td>{{ $remitaResponse->status }}</td>
					</tr>
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