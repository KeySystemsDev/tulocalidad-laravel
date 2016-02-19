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
			<div class="cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Articulos</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="total">Sub Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ url('img/no-imagen.jpg') }}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">lol</a></h4>
								<p>Web ID: 202</p>
							</td>
							<td class="cart_price">
								<p>20 BsF</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">20 BsF</p>
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

	<section id="do_action">
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