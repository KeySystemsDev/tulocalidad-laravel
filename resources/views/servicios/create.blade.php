@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_servicio.js') }}"></script>
@endsection


@section('content')
	<div class="container" ng-controller='ServicioContoller'>

		@if($servicio)
			<h2>Editar Servicios</h2>
			<div ng-init="model={{ $servicio }}"></div>
			<div ng-init="img = '{{ url ('/uploads/servicios/low/') }}/'+model.url_imagen_servicio" ></div>			
			<form action="{{ url('/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio) }}" method="POST"  enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
		@else
			<h2>Crear Servicios</h2>
			<form action="{{ url('/empresas/'.$id_empresa.'/servicios/') }}" method="POST" ng-submit="submit(formulario.$valid)"  enctype="multipart/form-data">		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_empresa" value="{{ $id_empresa }}">
				<br><br>

				<div class="form-group">
					<label class="control-label col-md-3">Imagen del Servicio</label>
					<div class="col-md-9 iconic-input right">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<input type="hidden" name="namefile" id="namefile" ng-model="model.url_imagen_servicio" ng-value="model.url_imagen_servicio" ng-update-hidden required>
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
							<div class="error campo-requerido" ng-show="formulario.namefile.$invalid && (formulario.namefile.$touched || submitted)">
							<small class="error" ng-show="formulario.namefile.$error.required">
								* Campo requerido.
						    </small>
						</div>	
						</div>											
					</div>
				</div>					
				<div class="from-group">
					<label for="">Nombre del servicio</label>
					<input type="text" class="form-control" ng-model="model.nombre_servicio" name="nombre_servicio">
				</div>
				<br>
				<div class="from-group">
					<label for="">Descripcion del servicio</label>
					<input type="text" class="form-control" ng-model="model.descripcion_servicio" name="descripcion_servicio">
				</div>
				<br>
				<div class="from-group">
					<label for="">Precio del servicio</label>
					<input type="text" class="form-control" ng-model="model.precio_servicio" name="precio_servicio">
				</div>
				<br>

	            		
				<button class="btn btn-success btn-stm" type="submit">
					@if($servicio)
						Actualizar
					@else
						Registrar
					@endif
				</button>
				@include('modals/upload_image')
			</form>
	</div>
@stop