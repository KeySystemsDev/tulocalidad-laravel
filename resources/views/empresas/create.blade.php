@extends('base-admin')

@section('content')
	<div class="container" >

		@if($empresa)
			<h2>Editar Empresa</h2>
			<div ng-init="empresa={{ $empresa }}"></div>
			<form action="{{ url('empresas/'.$empresa->id_empresa) }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
		@else
			<h2>Crear Empresa</h2>
			<form action="{{ url('empresas/') }}" method="POST">		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br><br>
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
					<input type="text" class="form-control" ng-model="empresa.parroquia_direccion" name="parroquia_direccion">
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
	            		
				<button class="btn btn-success btn-stm" type="submit">
					@if($empresa)
						Actualizar
					@else
						Registrar
					@endif
				</button>
			</form>
	</div>
@stop