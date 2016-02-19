@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
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
{{$solicitudes}}
		@if(count($solicitudes)!=0)
	    <section id="cart_items">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Contrato</td>
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
								<h4><a href="">fdsfds</a></h4>
								<p>Web ID: 45435</p>
							</td>
							<td class="cart_price">
								<p>32432 BsF</p>
							</td>
							<td class="cart_quantity">
								43
							</td>
							<td class="cart_total">
								<p class="cart_total_price">3543 BsF</p>
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
</div>
@endsection
