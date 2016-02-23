@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/helper.js') }}"></script>
	<script src="{{ asset('/js/controllers/solicitudes_vendedor.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="SolicitudesController">
	
	@include('layouts/navbar-admin')

	@include('layouts/sidebar-admin')

	@include('alerts.mensaje_success')
	@include('alerts.mensaje_error')

	<div id="content" class="content ng-scope">

		<ol class="breadcrumb navegacion-admin pull-left">
	        <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
	        <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
	    	<li><i class="fa fa-file-text"></i> Lista de Contratos</li>
	    </ol>

	    <h1 class="page-header page-header-new">.</h1>

		<div ng-init="solicitudes={{$solicitudes}}"></div>
		<div ng-init="url='{{url()}}/'"></div>
		
		@if(count($solicitudes)!=0)

		<ul class="result-list">
			<li ng-repeat="solicitud in solicitudes">
	            <div class="result-image">
	                <a href="javascript:;"><img src="[[ url + 'uploads/servicios/low/' + solicitud.servicio.url_imagen_servicio]]" alt=""></a>
	            </div>
	            <div class="result-info">
	                <h4 class="title"><a href="javascript:;">[[solicitud.servicio.nombre_servicio]]</a></h4>
	                <p class="location">Web ID: [[solicitud.servicio.id_servicio]]</p>
	                <p class="desc">
	                    [[solicitud.texto_solicitud]]
	                </p>
	            </div>
	            <div class="result-price">
	                <small>[[solicitud.fecha_creacion_solicitud]]</small> Estatus 
	                <a ng-click="pagoInfo(solicitud)" href="#por_responder" class="btn btn-success btn-block" data-toggle="modal">Por Responder</a>
	                
	            </div>
	        </li>
        </ul>

	@else
		<section id="do_action">
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa-file-text"></i>
					<h1> No tiene Contratos.</h1>
				</div>
			</div>
		</section>
	@endif
	</div>	
	
	@include('modals/servicio/por_responder')
</div>

@endsection
