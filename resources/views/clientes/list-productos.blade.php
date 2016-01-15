@extends('base-cliente')

@section('controller')
	<script src="{{ asset('/js/controllers/cliente_producto.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ClienteProducto">
	
	@include('layouts/navbar-cliente')
	
	<br><br>

	@include('layouts/publicidad-larga')

	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Lista de Productos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div ng-init="url='{{url()}}/'"></div>
	<section ng-init="array={{ $productos}}">
		<div class="container">
			<div class="row">
				@include('layouts/categorias-cliente')
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Lista de Productos</h2>						
						<div class="col-sm-4" ng-repeat="item in array.data">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="[[url + 'detalle-producto/' + item.id_producto]]">
											<img ng-src="[[url + 'uploads/productos/high/' + item.primera_imagen.nombre_imagen_producto]]" alt="">
										</a>
										<h2>[[item.precio_producto]] BsF</h2>
										<p>[[item.nombre_producto]]</p>
										<a ng-click="modalInfo(item)" href="#modal_carrito_compra" data-toggle="modal" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			                            @include('modals/modal_carrito_compra')
									</div>
								</div>
							</div>
						</div>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

	<center>
		<ul class="pagination" ng-if="array.total">
			<li ng-if="array.current_page-2 >= 1">
				<a href="[[array.prev_page_url]]"><</a>
			</li>

			<li ng-if="array.prev_page_url">
				<a href="[[array.prev_page_url]]">[[array.current_page-1]]</a>
			</li>

			<li class="active">
				<a href="">[[array.current_page]]</a>
			</li>

			<li ng-if="array.next_page_url">
				<a href="[[array.next_page_url]]">[[array.current_page+1]]</a>
			</li>

			<li ng-if="array.current_page+2 <= array.last_page ">
				<a href="[[array.next_page_url]]">></a>
			</li>
		</ul>
	</center>


	@include('layouts/footer-cliente')

</div>
@endsection
