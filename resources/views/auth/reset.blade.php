@extends('base')

@section('content')

@section('js')
	<script src="{{ asset('public/js/controllers/auth/reset.js') }}"></script>
@endsection

	@include('layouts/nav-top')

	<div class="container conf" ng-controller="ResetContraseñaController">
		<div class="row">
			 <div class="col-lg-12 box-conf">
				 			
				<div class="row" id="real-estates-detail">
                    
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <div class="panel panel-default item-perfil">
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <img class="img-perfil img-5" src="{{asset('img/usuario.png')}}">
                                    <p>{{\Session::get('usuario')}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-group">
                                	<a class="list-group-item item-i"> Modificar contraseña <i class="fa fa-chevron-right fa-1x"></i></a>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="panel item-perfil">
                            <div class="panel-body">

                            	<h4 class="page-header">
                            		Modificar contraseña
                        		</h4>
                        		<p>Cambia o recupera tu contraseña actual.</p>

                        		<br><br>

                        		<form class="form-horizontal" role="form" method="POST" id="formulario" name="formulario" action="{{ url('/password/reset') }}">

									<div class="row">
										<div class="col-lg-3 col-lg-offset-4"><h6>* Datos requeridos</h6></div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Contraseña actual: *</label>
										<div class="col-md-6">
											<input type="password" class="form-control" ng-model="pw_old" name="password_old" required>
										</div>

									</div>
									
									<div class="form-group">
										<label class="col-md-4 control-label"></label>
										<div class="col-md-6">
											<a href="{{ url('/password/email') }}">¿Olvidaste tu contraseña?</a>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Nueva contraseña: *</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password" ng-model="pw" ng-blur="validar_pass1()"
													name="pw" id="pw" ng-class="{'error':error_pass1 && submit_pass1}" required >
											<div class="col-lg-10" ng-show="error_pass1 && submit_pass1" ng-cloak>
					        					<p class="help-block" ng-cloak>[[msj_error_pass1]]</p>
					      					</div>	
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-4 control-label">Confirmar contraseña: *</label>
										<div class="col-md-6">
											<input type="password" class="form-control" name="password2" ng-model="pw2" ng-blur="validar_pass2()"
													 name="pw2" id="pw2" ng-class="{'error':error_pass2 && submit_pass2}" required>
											<ul id="strength" check-strength="pw"></ul>
											<div class="col-lg-10" ng-show="error_pass2 && submit_pass2" ng-cloak>
					        					<p class="help-block" ng-cloak>[[msj_error_pass2]]</p>
					      					</div>	
										</div>						
									</div>
									
									<br>
									<div class="form-group">
										<div class="col-md-3 col-md-offset-4">
											<button type="button" ng-click="checkMe()" ng-disabled="formulario.$invalid || error_pass2 || error_pass1" class="btn btn-info">
												Guardar
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
		@include('modals/validacion_modal')
	</div>

	@include('layouts/footer')

@endsection
