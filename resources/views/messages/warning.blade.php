@if(Session::has('warning'))
	<div class="row justify-content-center mt-1" id="error-messages">
		<div class="col-sm-8 col-10 offset-1">
			<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
				<p>{{ Session::get('warning') }}</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
@endif