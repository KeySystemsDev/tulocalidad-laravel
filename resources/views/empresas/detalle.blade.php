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
                    <a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}" class="btn btn-danger btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Gestionar Servicios">
                        <i class="fa fa-coffee"></i>
                    </a>
                </div>
            </div>
        </ol>
        

        <h1 class="page-header"><i class="fa fa-laptop"></i> Detalle de Empresas </h1>

        @include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
        
        <div class="row">

            <div class="col-md-5 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Empresa {{ $empresa->nombre_empresa }} </h4>
                    </div>

                    <div class="panel-body">

						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div class="well well-color">
								<img class="img-detalle-empresa" src="{{ url ('/uploads/empresas/high/'.$empresa->url_imagen_empresa) }}"></img>
								</div>
							</div>
						</div>

						<div class="nombre-empresa-detalle">
							{{ $empresa->nombre_empresa }}
						</div>
						<br>
						<div class="center">
							<small class="label label-info label-size">j-40162924-5</small>
						</div>
						<br>
						<div class="descripcion-empresa-detalle">
							{{ $empresa->descripcion_empresa}}
						</div>

					</div><!-- boby -->
                </div>
            </div>

            <!-- begin col-12 -->
            <div class="col-md-7 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Detalle Empresa </h4>
                    </div>

                    <div class="panel-body">
						<table class="table table-hover personal-task">
                                <tbody>
                                    <tr>
                                        <td width="7%">
                                            <i class=" fa fa fa-map-marker" data-original-title="" title=""></i>
                                        </td>
                                        <td>{{ $empresa->municipio_direccion}} 
                                        / {{ $empresa->parroquia_direccion}} 
                                        / {{ $empresa->urbanizacion_direccion}} 
                                        / {{ $empresa->calle_avenida_direccion}} 
                                        / {{ $empresa->casa_apto_direccion}} 
                                        / {{ $empresa->piso_direccion}}
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-cubes"></i>
                                        </td>
                                        <td>Asesoría Informática</td>
                                        <td></td>
                                    </tr>
                                    @if($telefonos)
                                    	@foreach($telefonos as $telefono)
	                                    <tr>
	                                        <td>
	                                            <i class="fa fa-phone"></i>
	                                        </td>
	                                        <td> ({{$telefono->codigo_telefono}}) {{$telefono->numero_telefono}} </td>
	                                        <td></td>
	                                    </tr>
                                    	@endforeach
                                    @endif
                                    <tr>
                                        <td>
                                            <i class="fa fa-envelope"></i>
                                        </td>
                                        <td>{{ $empresa->correo_empresa }}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-link"></i>
                                        </td>
                                        <td><a target="_black" href="http://{{ $empresa->web_empresa}}">{{ $empresa->web_empresa}}</a></td>
                                        <td></td>
                                    </tr>
                                    @if($redes)
                                    	@foreach($redes as $red)
	                                    <tr>
	                                        <td>
	                                            <i class="fa fa-home"></i>
	                                        </td>
	                                        <td> {{$red->nombre_red_social}} - {{$red->identificador_red}} </td>
	                                        <td></td>
	                                    </tr>
                                    	@endforeach
                                    @endif
                                </tbody>
                            </table>
					</div><!-- boby -->
                </div>
            </div>

            <div class="col-md-12 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Empresa Mapa</h4>
                    </div>

                    <div class="panel-body">
						
						<div ng-init="mapa = {id : 0, coords : { latitude: '{{ $empresa->latitud_empresa}}', longitude: '{{ $empresa->longitud_empresa}}'} }"></div>
                    	<div ng-init="mapa_posicion = { zoom: 14, center : { latitude: '{{ $empresa->latitud_empresa}}', longitude: '{{ $empresa->longitud_empresa}}'} }"></div>
						
						<div class="col-lg-12 col-md-12 col-xs-12 col-maps">
	                        <section class="panel panel-map">
	                            <header class="panel-heading-maps">
	                                <div id="map_canvas">
	                                    <ui-gmap-google-map 
	                                        center="mapa_posicion.center" 
	                                        zoom="mapa_posicion.zoom" 
	                                        draggable="true" 
	                                        options="options">
	                                            <ui-gmap-marker 
	                                                coords="mapa.coords" 
	                                                idkey="mapa.id">
	                                            </ui-gmap-marker>
	                                    </ui-gmap-google-map>
	                                </div>
	                            </header>
	                        </section>
	                    </div>

					</div><!-- boby -->
                </div>
            </div>

        
        </div><!-- row -->

    </div><!-- content -->
	
</div>
@endsection
