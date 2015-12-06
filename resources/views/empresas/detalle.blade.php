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
		<br><br>
	<div>
		<a class='btn btn-smt btn-success' href="{{ url('/empresas/'.$id_empresa.'/productos')}}"> Gestionar Productos</a>		
		<a class='btn btn-smt btn-success' href="{{ url('/empresas/'.$id_empresa.'/servicios')}}"> Gestionar Servicios</a>	
	</div>
	<br>
	<h3>Detalle de la empresa</h3>
	<img src="{{ url ('/uploads/empresas/high/'.$empresa->url_imagen_empresa) }}"></img> <br><br>
	nombre_empresa: {{ $empresa->nombre_empresa }}  <br><br>
	correo_empresa: {{ $empresa->correo_empresa }}  <br><br>
	descripcion_empresa: {{ $empresa->descripcion_empresa}}  <br><br>
	web_empresa: {{ $empresa->web_empresa}}  <br><br>
	id_estado: {{ $empresa->id_estado}} <br><br>
	municipio_direccion: {{ $empresa->municipio_direccion}} <br><br>
	parroquia_direccion: {{ $empresa->parroquia_direccion}}  <br><br>
	urbanizacion_direccion: {{ $empresa->urbanizacion_direccion}}  <br><br>
	calle_avenida_direccion: {{ $empresa->calle_avenida_direccion}}  <br><br>
	casa_apto_direccion: {{ $empresa->casa_apto_direccion}}  <br><br>
	piso_direccion: {{ $empresa->piso_direccion}}  <br><br>
<br><br>
	@if($telefonos)
		telefonos: <br><br>
		@foreach($telefonos as $telefono)
			<li>({{$telefono->codigo_telefono}}){{$telefono->numero_telefono}} </li><br>
		@endforeach
	@endif
<br><br>
	@if($redes)
		redes sociales: <br><br>
		@foreach($redes as $red)
			<li> {{$red->nombre_red_social}} - {{$red->identificador_red}} </li><br>
		@endforeach
	@endif
<br><br>
</div>
@stop