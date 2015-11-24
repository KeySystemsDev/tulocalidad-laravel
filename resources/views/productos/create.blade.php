@extends('base-admin')

@section('content')
	<div class="container" >

		@if($producto)
			<h2>Editar Producto</h2>
			<div ng-init="model={{ $producto }}"></div>
			<form action="{{ url('/empresas/'.$id_empresa.'/productos/'.$producto->id_producto) }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
		@else
			<h2>Crear Producto</h2>
			<form action="{{ url('/empresas/'.$id_empresa.'/productos/') }}" method="POST">		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_empresa" value="{{ $id_empresa }}">
				<br><br>
				<div class="from-group">
					<label for="">Nombre de producto</label>
					<input type="text" class="form-control" ng-model="model.nombre_producto" name="nombre_producto">
				</div>
				<br>
				<div class="from-group">
					<label for="">Descripcion empresa</label>
					<input type="text" class="form-control" ng-model="model.descripcion_producto" name="descripcion_producto">
				</div>
				<br>
				<div class="from-group">
					<label for="">Precio</label>
					<input type="text" class="form-control" ng-model="model.precio_producto" name="precio_producto">
				</div>
				<br>		
				<div class="from-group">
					<label for="">Texto enriquecido</label>
					<input type="text" class="form-control" ng-model="model.texto_enriquecido_producto" name="texto_enriquecido_producto">
				</div>
	            		
				<button class="btn btn-success btn-stm" type="submit">
					@if($producto)
						Actualizar
					@else
						Registrar
					@endif
				</button>
			</form>
	</div>
@stop