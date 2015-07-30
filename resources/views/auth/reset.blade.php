@extends('base')

@section('content')

	@include('layouts/nav-top')

	<div class="container conf">
		<div class="row">
			 <div class="col-lg-12 box-conf">
				 			
				<div class="row" id="real-estates-detail">
                    
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="panel panel-default item-perfil">
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <img class="img-perfil" src="{{asset('img/usuario.png')}}">
                                    <p>{{\Session::get('usuario')}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-group">
                                	<a class="list-group-item item-i"> Contraseña <i class="fa fa-chevron-right fa-1x"></i></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="panel item-perfil">
                            <div class="panel-body">

                            	<h4 class="page-header">
                            		Contraseña
                        		</h4>
                        		<p>Cambia o recupera tu contraseña actual.</p>

                        		<br><br><br>

                        		<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">

									<div class="form-group">
										<label class="col-md-4 control-label">Contraseña actual</label>
										<div class="col-md-6">
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
										</div>

									</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label"></label>
										<div class="col-md-6">
											<a href="{{ url('/password/email') }}">¿Olvidaste tu contraseña?</a>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Nueva contraseña</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password">
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Confirmar contraseña</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password_confirmation">
										</div>
									</div>
									
									<br><br>
									<div class="form-group">
										<div class="col-md-3 col-md-offset-4">
											<button type="submit" class="btn btn-info">
												Guardar Cambios
											</button>
										</div>
									</div>
								</form>

                                
                            </div>
                        </div>
                    </div>
                </div>

		
			</div>
		</div>
	</div>

<!--	
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Reset Password
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>-->

	@include('layouts/footer')

@endsection
