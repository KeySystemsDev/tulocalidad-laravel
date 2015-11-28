@extends('base-admin')

@section('content')
<div class="container">
	@foreach($imagenes as $imagen)
		<img src="{{url('/uploads/productos/mid/'.$imagen->nombre_imagen_producto)}}" alt="">
	@endforeach
	<br><br>
	 nombre: {{ $producto->nombre_producto }}  <br><br>
	 descripcion: {{ $producto->descripcion_producto}}  <br><br>
	 precio: {{ $producto->precio_producto }}  <br><br>
	


	
</div>
@stop