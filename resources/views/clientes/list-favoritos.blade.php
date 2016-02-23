@extends('base-cliente')

@section('controller')
	<script src="{{ asset('/js/controllers/favoritos.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="FavoritosController">
	
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
	
	<div ng-init="productos={{$productos}}"></div>
	<div ng-init="servicios={{$servicios}}"></div>
	<div ng-init="url='{{url()}}/'"></div>

    <section id="cart_items">
		<div class="container">
			<div class="cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Productos</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="producto in productos">
							<td class="cart_product">
								<a href="[[ url + 'detalle-producto/' + producto.id_producto]]"><img src="[[ url + 'uploads/productos/low/' + producto.producto.primera_imagen.nombre_imagen_producto]]" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="[[ url + 'detalle-producto/' + producto.id_producto]]">[[producto.producto.nombre_producto]]</a></h4>
								<p>Web ID: [[producto.id_producto]]</p>
							</td>
							<td class="cart_price">
								<p>[[producto.producto.precio_producto]] BsF</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">[[producto.producto.precio_producto]] BsF</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="javascript:;" ng-click="eliminar_favorito( 'productos',producto.id_producto)"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="cart_items">
		<div class="container">
			<div class="cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Servicio</td>
							<td class="description"></td>
							<td class="total">Descripción</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat="servicio in servicios">
							<td class="cart_product">
								<a href="[[ url + 'detalle-servicio/' + servicio.servicio.id_servicio]]"><img src="[[ url + 'uploads/servicios/low/' + servicio.servicio.url_imagen_servicio]]" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="[[ url + 'detalle-servicio/' + servicio.servicio.id_servicio]]">[[servicio.servicio.nombre_servicio]]</a></h4>
								<p>Web ID: [[servicio.servicio.id_servicio]]</p>
							</td>
							<td class="cart_price col-md-6">
								<p>[[servicio.servicio.descripcion_servicio]]</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="#"><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action" ng-show="!productos">
		<div class="container">
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa-heart"></i>
					<h1> No tiene articulos Favoritos.</h1>
				</div>
			</div>
		</div>
	</section>

</div>
@endsection