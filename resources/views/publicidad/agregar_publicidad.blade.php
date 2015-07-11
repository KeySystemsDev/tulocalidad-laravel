@extends('base')

@section('js')
	<script src="{{ asset('/js/controllers/publicidad/publicidad_registro.js') }}"></script>
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
								<img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
								<h2>
									Publicidad
								</h2>
								<p>
									Nueva Campaña Publicitaria
								</p>
							</header>
						</section>
					</div>

					<div class="col-lg-12">
						<section class="panel">
							<div class="panel-body">

								<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" id="publicidad" action="/mis-publicidades/agregar-exitoso" method="post" name="publicidad" enctype="multipart/form-data">

									<input type="hidden" name="id_empresa"><br>

									<div class="form-group">
										<label class="control-label col-lg-3" for="inputSuccess">Empresa</label>
										<div class="col-lg-9">
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
										<label class="control-label col-lg-3">Titulo</label>
										<div class="col-sm-9 iconic-input right">
											<i class="fa fa-bullhorn" data-original-title="" title=""></i>
											<input type="text" maxlength="20" class="form-control" placeholder="Titulo" name="i_titulo" ng-model="formData.i_titulo" required>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-3">Descripción de la Campaña</label>
										<div class="col-sm-9 iconic-input right">
											<textarea cols=20 rows=3 class="form-control" name="i_descripcion" ng-model="formData.i_descripcion" required></textarea>
										</div>
									</div>

									<div class="form-group last">
										<label class="control-label col-lg-3">Imagen de Publicidad</label>
										<input type="hidden" name="namefile" id="namefile" ng-model="formData.namefile" ng-update-hidden>
										<div class="col-sm-9 iconic-input right">

											<div class="fileinput fileinput-new" data-provides="fileinput">
												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
													<img class="img-responsive img-responsive-custon" ng-src="[[img]]" alt="">
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
												<div>
													<button type="button" class="btn btn-success" style="width: 200px;" data-toggle="modal" data-target="#myModal">Cargar imagen</button>
												</div>
											</div>

										</div>

									</div>

							</div>
						</section>
					</div>

					<div class="col-lg-12">
						<section class="panel">
							<header class="panel-heading center">
								<button class="btn btn-success btn-lg fa fa-check" type="submit" value="Agregar" ng-disabled="publicidad.$invalid"> Agregar</button>
							</header>
						</section>
					</div>

					</form>
				</div>
			</div>
		</div>


		<!-- Modal -->
		<div class="modal fade .bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o"></i> Elige una Imágen</h4>
					</div>
					<div class="modal-body">
						<div>
							<form action="registro" method="post">
								<div class = "row">
									<div class="col-xs-3">Seleccione una imagen:</div>
									<div class="col-xs-2">
									<span class="btn btn-success btn-file"><i class="fa fa-picture-o"></i> Seleccionar Archivo
									<input type="file" name="i_image" file-model="myFile" id="fileInput"/>
									</span>
									</div>
								</div>
								<br><br>
								<div class="row">
									<div class="cropArea col-xs-5 col-xs-offset-1" >
										<img-crop area-type="circle" image="myImage" result-image-size="700" result-image-quality="1" result-image='srcimg'></img-crop>
									</div>
									<div class="col-xs-5 col-xs-offset-1">
										<div><img class="view-modal-img" ng-src="[[srcimg ]]"/></div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" ng-click="return_img(img_select)">Salvar Imágen</button>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection