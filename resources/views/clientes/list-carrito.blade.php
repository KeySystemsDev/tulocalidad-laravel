@extends('base-cliente')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-cliente')

	<br><br>

	<section id="advertisement">
		<div class="container">
			<img src="{{ asset('/cart/Eshopper/images/shop/advertisement.jpg') }}" alt="" />
		</div>
	</section>

	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Lista de Carrito</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	@if($productos)
	<section id="cart_items">
		<div class="container">
			<div class="cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Carrito</td>
							<td class="description"></td>
							<td class="price">Cantidad</td>
							<td class="price">Precio</td>
							<td class="total">Sub Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($productos as $producto)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('/uploads/productos/low/'.$producto['data_producto']['primera_imagen']['nombre_imagen_producto']) }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$producto['data_producto']['nombre_producto']}}</a></h4>
								<p>Web ID: {{$producto['data_producto']['id_producto']}}</p>
							</td>
							<td class="cart_price">
								<p>{{$producto['cantidad_producto_carrito']}}</p>
							</td>
							<td class="cart_price">
								<p>{{$producto['data_producto']['precio_producto']}} BsF</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$producto['sub_total']}} BsF</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url( '/eliminar-carrito/'.$producto['id_carrito']) }}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>Seguro que desea comprar los productos?</h3>
				<p>Todos los productos seran borrados de su carrito de compra una vez efectue la operación.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-info update" href="{{ url( '/comprar/metodo-pago' ) }}">Comprar <i class="fa fa fa-shopping-cart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	@else
	<section id="do_action">
		<div class="container">
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa fa-shopping-cart"></i>
					<h1> No tiene Productos en su Carrito.</h1>
				</div>
			</div>
		</div>
	</section>
	@endif


	@include('layouts/footer-cliente')
	
</div>
@endsection
