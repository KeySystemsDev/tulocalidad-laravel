@extends('base-admin')

@section('content')
<div class="container">
			@include('layouts/navbar-admin')

		<br>
		<br>
		<br>
		<br>
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
	<img src="{{ url ('/uploads/servicios/high/'.$servicio->url_imagen_servicio) }}"></img> <br>
	 nombre: {{ $servicio->nombre_servicio }}  <br><br>
	 descripcion: {{ $servicio->descripcion_servicio}}  <br><br>
	 precio: {{ $servicio->precio_servicio }}  <br><br>
	


	
</div>
@stop