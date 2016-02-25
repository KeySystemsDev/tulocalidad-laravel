@extends('base-cliente')

@section('controller')
	<script src="{{ asset('/js/controllers/contrato_cliente.js') }}"></script>
@endsection


@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ContratoController">
	
	@include('layouts/navbar-cliente')

	@include('alerts.mensaje_success')
	@include('alerts.mensaje_error')

	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Contratos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div ng-init="solicitudes={{$solicitudes}}"></div>
	<div ng-init="url='{{url()}}/'"></div>
	[[solicitudes]]
	
	@if(count($solicitudes)!=0)
    <section id="cart_items">
		<div class="container">
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
								<h4><span  ng-if="solicitud.estatus_solicitud == 1" class="label label-warning">Esperando Respuesta</span></h4>
								<a ng-if="solicitud.estatus_solicitud == 2" ng-click="retrazar_presupuesto(solicitud)" href="#rechazar_contrato" data-toggle="modal" class="btn btn-danger btn-solitud" >Rechazar</a>
								<a ng-if="solicitud.estatus_solicitud == 2" ng-click="aceptar_presupuesto(solicitud)" href="#aceptar_servicio" data-toggle="modal" class="btn btn-success btn-solitud">Aceptar</a>
								<a ng-if="solicitud.estatus_solicitud == 3" href="javascript:;" class="btn btn-tulocalidad btn-solitud">Contratado</a>
								<h4><span ng-if="solicitud.estatus_solicitud == 4" class="label label-danger">Rechazado</span></h4>
								<h4><span ng-if="solicitud.estatus_solicitud == 5" class="label label-info">Vencido</span></h4>
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
				
						<tr ng-if="solicitud.estatus_solicitud == 2">
							<td class="cart_product ceter">
								Respuesta:
							</td>
							<td class="cart_price">
								<p>[[solicitud.texto_presupuesto_solicitud]]</p>
							</td>
							<td>
								<div>
									<p>Fecha limite: [[solicitud.fecha_vencimiento_solicitud]]</p>
									<p style="font-size: 18px;">Precio: [[solicitud.monto_presupuesto_solicitud]] BsF</p>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</section>
	@else
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa-file-text"></i>
					<h1> No tiene Contratos.</h1>
				</div>
			</div>
		</div>
	</section>
	@endif
	@include('modals/servicio/aceptar_servicio')
	@include('modals/servicio/rechazar_contrato')
</div>
@endsection