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
				<div class=""><center><img class="img-registrar-logo" src="{{ asset('/img/tulocalidad-blanco.png') }}"></center></div>
				<div class="panel-body">
					<div class="row">
                        <div class="col-lg-6 col-md-6 msn-no-empresa">
                            <div class="well well-danger well-borde">
                                <h4>
                                    Contraseña Enviada.
                                </h4>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
