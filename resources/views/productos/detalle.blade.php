@extends('base-admin')

@section('content')
<div class="container">
	 nombre: {{ $producto->nombre_producto }}  <br><br>
	 descripcion: {{ $producto->descripcion_producto}}  <br><br>
	 precio: {{ $producto->precio_producto }}  <br><br>
	


	
</div>
@stop