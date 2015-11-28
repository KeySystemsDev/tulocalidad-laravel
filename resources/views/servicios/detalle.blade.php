@extends('base-admin')

@section('content')
<div class="container">
	<img src="{{ url ('/public/uploads/servicios/high/'.$servicio->url_imagen_servicio) }}"></img> <br>
	 nombre: {{ $servicio->nombre_servicio }}  <br><br>
	 descripcion: {{ $servicio->descripcion_servicio}}  <br><br>
	 precio: {{ $servicio->precio_servicio }}  <br><br>
	


	
</div>
@stop