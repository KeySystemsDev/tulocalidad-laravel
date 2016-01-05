@extends('base-cliente')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-cliente')
	
	<br><br>

	<section id="advertisement">
		<div class="container">
			<img src="{{ asset('/cart/Eshopper/images/shop/advertisement.jpg') }}" alt="">
		</div>
	</section>

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
										<a href="{{ url('detalle-producto') }}">
											<img ng-src="[[url + 'uploads/productos/high/' + item.primera_imagen.nombre_imagen_producto]]" alt="">
										</a>
										<h2>[[item.precio_producto]] BsF</h2>
										<p>[[item.nombre_producto]]</p>
										<a href="[[url + 'agregar-carrito/' + item.id_producto]]" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
