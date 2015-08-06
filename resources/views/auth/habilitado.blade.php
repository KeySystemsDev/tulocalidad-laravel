@extends('base')

<ul class="cb-slideshow ul-login">
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
    <li class="li-login"><span></span></li>
</ul>

@section('content')
		
	@include('layouts/nav-top-auth')
	
	<div class="container-fluid">

		<div class="row login-tulocalidad">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default border-tulocalidad">
					<center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center>
					<div class="panel-body">

						<center>
							@if ($codigo == 1)
								<label class="control-label">Usuario Habilitado Satisfactoriamente</label>
							@endif

							@if ($codigo == 2)
								<label class="control-label">Codigo Usado. Usuario ya fue habilitado</label>
							@endif

							@if ($codigo == -1)
								<label class="control-label">Codigo invalido</label>
							@endif
						</center>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
