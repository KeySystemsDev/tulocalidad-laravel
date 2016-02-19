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
                            <li><a href="javascript:;">Contratos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('img/no-imagen.jpg') }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Nombre</a></h4>
								<p>Web ID: 134</p>
							</td>
							<td class="cart_price">
								<p>150 BsF</p>
							</td>
							<td class="cart_quantity">
								2
							</td>
							<td class="cart_total">
								<p class="cart_total_price">300 BsF</p>
							</td>
						</tr>
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
							<li>Tipo Pago <span>Mercado pago</span></li>
							<li>Factura<span>202</span></li>
							<li>Total <span>300 BsF</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

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

</div>
@endsection