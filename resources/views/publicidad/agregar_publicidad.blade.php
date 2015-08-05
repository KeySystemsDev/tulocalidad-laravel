@extends('base')

@section('js')
	<script src="{{ asset('public/js/controllers/publicidad/publicidad_registro.js') }}"></script>
@endsection

@section('content')

	<div ng-controller="PublicidadController">
		
		@include('layouts/nav-top')

		@include('layouts/nav')

		<div class="container">
			<div id="main">
				<div class="row">

					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading center">
								<img class="img-registrar-logo" src="{{ asset('public/img/tulocalidad.png') }}">
								<h2>
									Publicidad
								</h2>
								<p>
									Nueva campaña publicitaria
								</p>
							</header>
						</section>
					</div>

					<div class="col-lg-12">
						<section class="panel">
							<div class="panel-body">

								<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" id="formulario" method="post" name="publicidad" enctype="multipart/form-data">

									<input type="hidden" name="id_empresa"><br>

	                                <div class="row">
	                                    <div class="col-lg-3 col-lg-offset-4"><h6>* Datos requeridos</h6></div>
	                                </div>
	                                <br>
									<div class="form-group">
										<label class="control-label col-lg-4" for="inputSuccess">Empresa:  *</label>
										<div class="col-lg-8">
											<select class="form-control m-bot15" name="i_empresa">
												<!--<option class="option" value="" selected >seleccione una empresa</option>-->
												@foreach($empresas as $empresa)
													@if($empresa->id_empresa==$id_seleccion)
														<option class="option" value="{{$empresa->id_empresa}}" selected >{{$empresa->nombre_empresa}}</option>
													@else
														<option class="option" value="{{$empresa->id_empresa}}">{{$empresa->nombre_empresa}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-4">Imagen de publicidad  *</label>
										<input type="hidden" name="namefile" id="namefile" ng-model="formData.namefile" ng-update-hidden required>
										<div class="col-sm-8 iconic-input right">

											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
													<img class="img-responsive img-responsive-custon" ng-src="[[img]]" alt="" style="width: 200px; height: 200px;">
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
												<div>
													<button type="button" class="btn btn-success" style="width: 200px;" data-toggle="modal" data-target="#myModal">
														<span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
														Seleccionar imagen
													</button>
												</div>
											</div>
										</div>
									</div>									

									<div class="form-group">
										<label class="control-label col-lg-4">Título:  *</label>
										<div class="col-sm-8 iconic-input right">
											<i class="fa fa-bullhorn" data-original-title="" title=""></i>
											<input type="text" maxlength="30" class="form-control" placeholder="Titulo" name="i_titulo" ng-model="formData.i_titulo" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-4">Descripción de la campaña:  *</label>
										<div class="col-sm-8 iconic-input right">
											<textarea cols=20 rows=3 class="form-control" name="i_descripcion" ng-model="formData.i_descripcion" required></textarea>
										</div>
									</div>
							</div>
						</section>
					</div>

					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading center">
								<button class="btn btn-success btn-lg fa fa-check" type="button" ng-click="checkMe()" ng-disabled="publicidad.$invalid"> Agregar</button>
							</header>
						</section>
					</div>

					</form>
				</div>
			</div>
		</div>
		@include('modals/validacion_modal')
		@include('modals/upload_imagen_modal')
	</div>

	@include('layouts/footer')

@endsection