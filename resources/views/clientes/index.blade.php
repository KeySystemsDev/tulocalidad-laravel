@extends('base-cliente')

@section('controller')
	<script src="{{ asset('/js/controllers/index.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="IndexController">
	
	@include('layouts/navbar-cliente')
	
	<div ng-init="empresa_1={{$empresas_1}}"></div>
	<div ng-init="empresa_2={{$empresas_2}}"></div>
	<div ng-init="servicios={{$servicios}}"></div>
	<div ng-init="productos={{$productos}}"></div>
	<div ng-init="url='{{url()}}/'"></div>
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Tu</span>Localidad</h1>
									<h2>Todo lo que buscas a la mano</h2>
									<p>Disfruta de todas las facilidades que ofrece nuestra aplicación móvil desde android. </p>
									<a href="https://play.google.com/store/apps/details?id=com.ionicframework.tulocalidad511234" class="btn btn-default" target="_blank" >
										<img width="150" src="img/movil/descarga-android.png">
									</a>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('img/publicidad/1.png') }}" class="girl img-responsive" alt="" />
									<!--<img src="{{ asset('/cart/Eshopper/images/home/pricing.png') }}"  class="pricing" alt="" />-->
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Key</span> Systems</h1>
									<h2>Diseños 100% Responsive</h2>
									<p>Refleja tus ideas, ten a la mano de un click tu pag web. </p>
									<a href="http://keygestion.com.ve" class="btn btn-default get" target="_blank">KeySystems</a>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('img/publicidad/3.png') }}" class="girl img-responsive" alt="" />
									<!--<img src="{{ asset('/cart/Eshopper/images/home/pricing.png') }}"  class="pricing" alt="" />-->
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Sistema</span> de Gestion</h1>
									<h2>Organiza tus ideas</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<a href="http://keygestion.com.ve/" class="btn btn-default get" target="_blank">KG</a>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('img/publicidad/2.png') }}" class="girl img-responsive" alt="" />
									<!--<img src="{{ asset('/cart/Eshopper/images/home/pricing.png') }}" class="pricing" alt="" />-->
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">

				@include('layouts/categorias-cliente')
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Recomendados</h2>
						<div class="col-sm-4" ng-repeat="producto in productos">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<a href="javascript:;" ng-click="agregar_favorito('productos', producto.id_producto)" class="button-favorito" ng-class="{'button-favorito-red': [[producto.favorito]]}"><i class="fa fa-heart"></i></a>
										<a ng-href="[[ url + 'detalle-producto/' + producto.id_producto]]">
										<img ng-src="[[ url + 'uploads/productos/high/' + producto.primera_imagen.nombre_imagen_producto]]" alt="" />
										</a>
										<h2>[[producto.precio_producto]] BsF</h2>
										<p class="text-ellipsis">[[producto.nombre_producto]]</p>
										<a ng-click="modalInfo(producto)" href="#modal_carrito_compra" data-toggle="modal" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								</div>
							</div>
						</div>
					</div><!--features_items-->
					
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tshirt" data-toggle="tab">Servicio</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								<div class="col-sm-3" ng-repeat="servicio in servicios">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<a href="javascript:;" ng-click="agregar_favorito('servicios',servicio.id_servicio)" class="button-favorito" ng-class="{'button-favorito-red': [[servicio.favorito]]}"><i class="fa fa-heart"></i></a>
												<img  ng-src="[[url + 'uploads/servicios/high/' + servicio.url_imagen_servicio]]" alt="" />
												<h2>[[servicio.precio_servicio]] BsF</h2>
												<p class="text-ellipsis">[[servicio.nombre_servicio]]</p>
												<a ng-href="[[ url + 'detalle-servicio/' + servicio.id_servicio]]" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4" ng-repeat="empresa in empresa_1">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img ng-src="[[ url + 'uploads/empresas/high/' + empresa.url_imagen_empresa]]" alt="">
													<h2 class="text-ellipsis">[[empresa.nombre_empresa]]</h2>
													<p>[[empresa.rif_empresa]]</p>
													<a ng-href="[[ url + 'detalle-empresa/' + empresa.id_empresa]]" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4" ng-repeat="empresa in empresa_2">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="[[ url + 'uploads/empresas/high/' + empresa.url_imagen_empresa]]" alt="" />
													<h2 class="text-ellipsis">[[empresa.nombre_empresa]]</h2>
													<p>[[empresa.rif_empresa]]</p>
													<a ng-href="[[ url + 'detalle-empresa/' + empresa.id_empresa]]" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
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
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	@include('layouts/footer-cliente')

	@include('modals/modal_carrito_compra')
	
</div>

@endsection
