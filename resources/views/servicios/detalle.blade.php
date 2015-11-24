@extends('base-admin')

@section('content')
<div class="container">
	 nombre: {{ $servicio->nombre_servicio }}  <br><br>
	 descripcion: {{ $servicio->descripcion_servicio}}  <br><br>
	 precio: {{ $servicio->precio_servicio }}  <br><br>
	


	
</div>
@stop