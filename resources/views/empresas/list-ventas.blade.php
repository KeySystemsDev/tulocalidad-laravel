@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-cliente')

	@include('layouts/sidebar-admin')

	@include('alerts.mensaje_success')
	@include('alerts.mensaje_error')

	<div id="content" class="content ng-scope">

		<ol class="breadcrumb navegacion-admin pull-left">
	        <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
	        <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
	    	<li><i class="fa fa-usd"></i> Lista de Ventas</li>
	    </ol>

	    <h1 class="page-header page-header-new">.</h1>
		
	    <section id="cart_items">
			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Carrito</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="quantity">Cantidad</td>
							<td class="total">Total</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('cart/Eshopper/images/cart/one.png')}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								2
							</td>
							<td class="cart_total">
								<p class="cart_total_price">100 BsF</p>
							</td>
						</tr>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('cart/Eshopper/images/cart/one.png')}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_quantity">
								2
							</td>
							<td class="cart_total">
								<p class="cart_total_price">100 BsF</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</section>

		<section id="do_action">
		
			<!--<div class="heading">
				<h3>Seguro que desea comprar los productos?</h3>
				<p>Todos los productos seran borrados de su carrito de compra una vez efectue la operación.</p>
			</div>-->
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Empresa <span>empresa</span></li>
							<li>Sub Total<span>100 BsF</span></li>
							<li>Total <span>200 BsF</span></li>
						</ul>
					</div>
				</div>
			</div>
			
		</section>
		
		<section id="do_action">
			
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa-usd"></i>
					<h1> No tiene Ventas Realizadas.</h1>
				</div>
			</div>
			
		</section>

	</div>

</div>
