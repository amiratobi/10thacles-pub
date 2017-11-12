@extends ('layouts.master')

@section ('content')
	<div class="containter">
		<div class="row">
			<div class="col">
				<div class="col-12 col-sm-10 col-md-8 ml-auto mr-auto border mt-5 pt-4 pb-4">
					
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