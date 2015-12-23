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

	<section id="cart_items">
		<div class="container">
			<div class="cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Cart</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('/cart/Eshopper/images/cart/one.png') }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>

						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('/cart/Eshopper/images/cart/two.png') }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('/cart/Eshopper/images/cart/three.png') }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>$59</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$59</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
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
							<a class="btn btn-info update" href="">Comprar <i class="fa fa fa-shopping-cart"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--<div id="content" class="content ng-scope">
        
        <h1 class="page-header"><i class="fa fa-laptop"></i> Lista de todos los productos </h1>
        
        <div class="row">

            <div class="col-12 ui-sortable">

                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Carrito de compras</h4>
                    </div>

                    <div class="panel-body">
		
						@include('alerts.mensaje_success')
						@include('alerts.mensaje_error')
								
						<table class="table table-hover">
						    <tbody>
								@foreach($productos as $producto)
							    	<tr>
										<td class ='row'>
											<div class='col-md-2'> 
												<img src="{{ url('/uploads/productos/low/'.$producto['data_producto']['primera_imagen']['nombre_imagen_producto']) }}" alt=""></div>
											<div class='col-md-2 col-xs-offset-1'>{{$producto['data_producto']['nombre_producto']}}</div>
											<div class='col-md-4 '>{{$producto['data_producto']['descripcion_producto']}}</div>
											<div class='col-md-1 '>{{$producto['data_producto']['precio_producto']}}</div>
										</td>
							        	<td >
							        		<a class="btn btn-sm btn-info" href="{{ url( '/eliminar-carrito/'.$producto['id_producto']) }}" data-toggle="tooltip" data-title="quitar del carrito"> borrar<i class="fa fa-"></i></a>
							        	</td>
							        </tr>
								@endforeach


						    </tbody>
						</table>

					</div>


                </div>

	            <div class="btn-toolbar">
	                <div class="btn-group">
	                    <a href="{{ url( '/comprar/metodo-pago' ) }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="comprar">
	                       comprar <i class="fa fa-plus"></i>
	                    </a>
	                </div>
	            </div>     

            </div>
        </div>

    </div> -->

	@include('layouts/footer-cliente')
	
</div>
@endsection
