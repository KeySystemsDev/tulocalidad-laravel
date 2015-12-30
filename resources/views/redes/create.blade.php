@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_redes_sociales.js') }}"></script>
@endsection


@section('content')
	<div class="container" ng-controller='RedesContoller'>
		@include('layouts/navbar-admin')

		<br>
		<br>
		<br>
		<br>
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
		@if($red)
			<h2>Editar Red Social</h2>
			<div ng-init="model={{ $red }}"></div>
			
			<form action="{{ url('/redes_sociales/'.$red->id_red_social) }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
		@else
			<h2>Crear Red Social</h2>
			<form action="{{ url('/redes_sociales/') }}" method="POST" ng-submit="submit(formulario.$valid)" >		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<br><br>

				
				<div class="from-group">
					<label for="">Nombre de red social</label>
					<input type="text" class="form-control" ng-model="model.nombre_red_social" name="nombre_red_social">
				</div>
				<br>	

				<div class="from-group">
					<label for="">Url </label>
					<input type="text" class="form-control" ng-model="model.url_red_social" name="url_red_social">
				</div>
				<br>

				<div class="from-group">
					<label for="">incono</label>
					<input type="text" class="form-control" ng-model="model.icon_red_social" name="icon_red_social">
				</div>
				<br>
	            		
				<button class="btn btn-success btn-stm" type="submit">
					@if($red)
						Actualizar
					@else
						Registrar
					@endif
				</button>
			</form>
	</div>
@stop