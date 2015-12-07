@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('/empresas/'.$id_empresa.'/productos')}}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Gestionar Productos">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Gestionar Servicios">
                        <i class="fa fa-coffee"></i>
                    </a>
                </div>
            </div>
        </ol>
        

        <h1 class="page-header"><i class="fa fa-laptop"></i> Detalle de Empresas </h1>
        
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-12 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Empresas</h4>
                    </div>

                    <div class="panel-body">

						@include('alerts.mensaje_success')
						@include('alerts.mensaje_error')

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
	piso_direccion: {{ $empresa->piso_direccion}}  <br><br><br><br>
	latitud: {{ $empresa->latitud_empresa}}  <br><br>
	longitud: {{ $empresa->longitud_empresa}}  <br><br><br><br>
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

					</div><!-- boby -->
                </div>
            </div>
        </div>

    </div><!-- content -->
	
</div>
@endsection
