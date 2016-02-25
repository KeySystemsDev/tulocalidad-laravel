@extends('base-admin')

@section('controller')
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
[[solicitudes]]
        <section id="cart_items">
			<div class="table-responsive cart_info">
				<table class="table table-condensed" ng-repeat="solicitud in solicitudes">
					<thead>
						<tr class="cart_menu">
							<td class="image">Servicios</td>
							<td class="description"></td>
							<td class="total">Estatus</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product col-md-2">
								<a href=""><img src="[[ url + 'uploads/servicios/low/' + solicitud.servicio.url_imagen_servicio]]" alt=""></a>
							</td>
							<td class="cart_description col-md-6">
								<h4><a href="">[[solicitud.servicio.nombre_servicio]]</a></h4>
								<p>Web ID: [[solicitud.servicio.id_servicio]]</p>
							</td>
							<td class="cart_total col-md-2">
								<a ng-if="solicitud.estatus_solicitud == 1" ng-click="pagoInfo(solicitud)" href="#por_responder" class="btn btn-success btn-solitud" data-toggle="modal">Por Responder</a>
				                <a ng-if="solicitud.estatus_solicitud == 2" href="javascript:;" class="btn btn-warning btn-solitud">Esperando Respuesta</a>
				                <a ng-if="solicitud.estatus_solicitud == 3" href="javascript:;" class="btn btn-tulocalidad btn-solitud">Contratado</a>
				                <a ng-if="solicitud.estatus_solicitud == 4" href="javascript:;" class="btn btn-danger btn-solitud">Rechazado</a>
				                <a ng-if="solicitud.estatus_solicitud == 5" href="javascript:;" class="btn btn-info btn-solitud">Vencido</a>
							</td>
						</tr>

						<tr>
							<td class="cart_product ceter">
								Solicitud:
							</td>
							<td class="cart_price">
								<p>[[solicitud.texto_solicitud]]</p>
							</td>
							<td>
								<p> Fecha Creación: [[solicitud.fecha_creacion_solicitud]]</p>
							</td>
						</tr>
				
						<tr>
							<td class="cart_product ceter">
								Respuesta:
							</td>
							<td class="cart_price">
								<p>[[solicitud.texto_presupuesto_solicitud]]</p>
							</td>
							<td>
								<div ng-if="solicitud.estatus_solicitud == 2">
									<p>Fecha limite: [[solicitud.fecha_vencimiento_solicitud]]</p>
									<p style="font-size: 18px;">Precio: [[solicitud.monto_presupuesto_solicitud]] BsF</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</section>

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
