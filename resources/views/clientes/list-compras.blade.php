@extends('base-cliente')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
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
                            <li><a href="javascript:;">Compras</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	@if(count($compras)!=0)

	@foreach($compras as $compra)
	    <section id="cart_items">
			<div class="container">
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Articulos</td>
								<td class="description"></td>
								<td class="price">Precio</td>
								<td class="quantity">Cantidad</td>
								<td class="total">Total</td>
							</tr>
						</thead>
						<tbody>
							@foreach($compra['productos_comprados'] as $articulo)
							<tr>
								<td class="cart_product">
									<a href=""><img src="{{ url('/uploads/productos/low/'.$articulo['primera_imagen']) }}" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{$articulo['nombre_producto']}}</a></h4>
									<p>Web ID: {{$articulo['id_producto_comprado']}}</p>
								</td>
								<td class="cart_price">
									<p>{{$articulo['precio_unidad']}} BsF</p>
								</td>
								<td class="cart_quantity">
									{{$articulo['cantidad_producto_comprados']}}
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{$articulo['precio_total']}} BsF</p>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</section>

		<section id="do_action">
			<div class="container">
				<!--<div class="heading">
					<h3>Seguro que desea comprar los productos?</h3>
					<p>Todos los productos seran borrados de su carrito de compra una vez efectue la operación.</p>
				</div>-->
				<div class="row">
					
					<div class="col-sm-6">
						<div class="total_area">
							<ul>
								<li>Tipo Pago <span>{{$compra['tipo_pago_compra']}}</span></li>
								<li>Factura<span>{{$compra['identificador_pago_compra']}}</span></li>
								<li>Total <span>{{$compra['precio_total_compra']}} BsF</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endforeach
	@else
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa-shopping-bag"></i>
					<h1> No tiene Compras Realizadas.</h1>
				</div>
			</div>
		</div>
	</section>
	@endif

</div>

