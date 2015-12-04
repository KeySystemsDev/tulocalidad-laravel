@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_empresa.js') }}"></script>
@endsection

@section('content')
	<div class="container" ng-controller="EmpresaContoller">
		@include('layouts/navbar-admin')

		<br>
		<br>
		<br>
		<br>
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
		@if($empresa)
			<h2>Editar Empresa</h2>
			<div ng-init="empresa={{ $empresa }}"></div>
			<div ng-init="incializar_telefonos({{ $telefonos }})"></div>
			<div ng-init="img = '{{ url ('/uploads/empresas/low/') }}/'+empresa.url_imagen_empresa" ></div>
			<form action="{{ url('empresas/'.$empresa->id_empresa) }}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="PUT">
		@else
			<h2>Crear Empresa</h2>
			<form action="{{ url('empresas/') }}" method="POST" enctype="multipart/form-data" name="formulario" id="formulario" ng-submit="submit(formulario.$valid)" novalidate>		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br><br>

				<div class="form-group">
					<label class="control-label col-md-3">Imagen de perfil</label>
					<div class="col-md-9 iconic-input right">
						<div class="fileinput fileinput-new" data-provides="fileinput">
							<input type="hidden" name="namefile" id="namefile" ng-model="empresa.url_imagen_empresa" ng-value="empresa.url_imagen_empresa" ng-update-hidden required>
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
				<br>		
				<div class="from-group">
					<label for="">Nombre de empresa</label>
					<input type="text" class="form-control" ng-model="empresa.nombre_empresa" name="nombre_empresa">
				</div>
				<br>
				<div class="from-group">
					<label for="">correo empresa</label>
					<input type="text" class="form-control" ng-model="empresa.correo_empresa" name="correo_empresa">
				</div>
				<br>
				<div class="from-group">
					<label for="">descripcion empresa</label>
					<input type="text" class="form-control" ng-model="empresa.descripcion_empresa" name="descripcion_empresa">
				</div>
				<br>
				<div class="from-group">
					<label for="">web empresa</label>
					<input type="text" class="form-control" ng-model="empresa.web_empresa" name="web_empresa">
				</div>
				<br>
				<div class="from-group">
					<label for="">Estado</label>
					<select class="form-control" name="id_estado" ng-model="empresa.id_estado" required>
						<option class="option" value="">Seleccione un estado</option>
						@foreach($estados as $key)
							<option class="option" value="{{$key->id_estado}}">
								{{$key->nombre_estado}}</option>
						@endforeach
					</select>
				</div>	
				<br>		
				<div class="from-group">
					<label for="">Municipio</label>
					<input type="text" class="form-control" ng-model="empresa.municipio_direccion" name="municipio_direccion">
				</div>
				<br>		
				<div class="from-group">
					<label for="">Parroquia</label>
					<input type="text" class="form-control" ng-model="empresa.parroquia_direccion" name="parroquia_direccion">
				</div>
				<br>	
				<div class="from-group">
					<label for="">Urbanizacion</label>
					<input type="text" class="form-control" ng-model="empresa.urbanizacion_direccion" name="urbanizacion_direccion">
				</div>
				<br>	
				<div class="from-group">
					<label for="">calle/avenida</label>
					<input type="text" class="form-control" ng-model="empresa.calle_avenida_direccion" name="calle_avenida_direccion">
				</div>
				<br>
				<div class="from-group">
					<label for="">casa / apto</label>
					<input type="text" class="form-control" ng-model="empresa.casa_apto_direccion" name="casa_apto_direccion">
				</div>
				<br>
				<div class="from-group">
					<label for="">piso</label>
					<input type="text" class="form-control" ng-model="empresa.piso_direccion" name="piso_direccion">
				</div>
				<br>
				<div class="from-group">telefonos:
						<button type='button' ng-click="addPhone()"> agregar telefono</button>
				</div>
				<div ng-repeat="telefono in telefonos track by $index">
					<br>
					<div class="from-group" >
						
						<label for="">telefono [[$index+1]]</label><br>
						<label for="">Codigo</label>
						<input type="text" class="form-control" ng-model='telefono.codigo' name="codigos[]">
						<label for="">Numero</label>
						<input type="text" class="form-control" ng-model='telefono.numero' name="telefonos[]">
					</div>
					<button type='button' ng-click="delPhone($index)"> eliminar telefono</button>
				</div>
				<br>
				<button class="btn btn-success btn-stm" type="submit">
					@if($empresa)
						Actualizar
					@else
						Registrar
					@endif
				</button>
				@include('modals/upload_image')
			</form>
			
	</div>
@stop