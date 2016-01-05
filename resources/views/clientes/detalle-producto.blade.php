@extends('base-cliente')

@section('controller')
	<script src="{{ asset('/js/controllers/cliente_producto.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ClienteProductoDetalle">
	
	@include('layouts/navbar-cliente')
	
	<br><br>
	
	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="{{ url('/lista-productos') }}">Lista de Productos <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Productos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<section>
		<div class="container">
			<div class="row">

				@include('layouts/categorias-cliente')

				<div ng-init="producto = {{$producto}}"></div>
				<div ng-init="url='{{url()}}/'"></div>

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img ng-src="[[url + 'uploads/productos/high/' + producto.primera_imagen.nombre_imagen_producto]]" alt="">
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img width="84" src="{{ asset('/img/no-imagen.jpg') }}" alt=""></a>
										  <a href=""><img width="84" src="{{ asset('/img/no-imagen.jpg') }}" alt=""></a>
										  <a href=""><img width="84" src="{{ asset('/img/no-imagen.jpg') }}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img width="84" src="{{ asset('/img/no-imagen.jpg') }}" alt=""></a>
										  <a href=""><img width="84" src="{{ asset('/img/no-imagen.jpg') }}" alt=""></a>
										  <a href=""><img width="84" src="{{ asset('/img/no-imagen.jpg') }}" alt=""></a>
										</div>										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!--<img src="images/product-details/new.jpg" class="newarrival" alt="">-->
								<h2>[[producto.nombre_producto]]</h2>
								<p>Web ID: [[producto.id_producto]]</p>
								<!--<img src="{{ asset('/cart/Eshopper/images/product-details/rating.png') }}" alt="">-->
								<span>
									<span>[[producto.precio_producto]] BsF</span>
									<a ng-click="modalInfo(producto)" href="#modal_carrito_compra" class="btn btn-info cart" data-toggle="modal">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
									@include('modals/modal_carrito_compra')
								</span>
								<p><b>Creado:</b> [[producto.created_at]]</p>
								<p><b>Categoría:</b> [[producto.nombre_categoria]]</p>   
								<p><b>Estatus:</b> [[producto.estatus_producto]]</p>
								<p><b>Cantidad:</b> [[producto.cantidad_producto]]</p>
								<!--<p><b>Vendidos:</b> 2</p>-->
								<a href=""><img src="{{ asset('/cart/Eshopper/images/product-details/share.png') }}" class="share img-responsive" alt=""></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Detalle</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<p>[[producto.descripcion_producto]]</p>
									<p><b>Write Your Review</b></p>
								</div>
							</div>				
						</div>
					</div><!--/category-tab-->
					
					<!--<div class="recommended_items">
						<h2 class="title text-center">Productos relacionados</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend1.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend2.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend3.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend1.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend2.jpg')}}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend3.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>-->
					
				</div>
			</div>
		</div>
	</section>

	@include('layouts/footer-cliente')

</div>
@endsection