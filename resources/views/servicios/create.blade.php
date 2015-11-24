@extends('base-admin')

@section('content')
	<div class="container" >

		@if($servicio)
			<h2>Editar Servicios</h2>
			<div ng-init="model={{ $servicio }}"></div>
			<form action="{{ url('/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio) }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
		@else
			<h2>Crear Servicios</h2>
			<form action="{{ url('/empresas/'.$id_empresa.'/servicios/') }}" method="POST">		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_empresa" value="{{ $id_empresa }}">
				<br><br>
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
			</form>
	</div>
@stop