@extends('base-admin')

@section('content')
<div class="container-fluid">



	<div class="row">


		<br>
		<br>
		<br>
		<br>
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reinicio de contraseña</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/reset-password') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo electronico</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Enviar nueva contraseña
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
