@extends('base-cliente')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-cliente')
	
	<br><br>

	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="{{ url('/lista-empresas') }}">Lista de Empresas <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Empresa</a></li>
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
				
				<div ng-init="empresa = {{$empresa}}"></div>
				<div ng-init="url='{{url()}}/'"></div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img ng-src="[[url + 'uploads/empresas/high/' + empresa.url_imagen_empresa]]" alt="">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!--<img src="images/product-details/new.jpg" class="newarrival" alt="">-->
								<h2>[[empresa.nombre_empresa]]</h2>
								<p>RIF: [[empresa.rif_empresa]]</p>
								<p>Web ID: [[empresa.id_empresa]]</p>
								<!--<img src="{{ asset('/cart/Eshopper/images/product-details/rating.png') }}" alt="">-->
								<span ng-repeat="telefono in empresa.telefonos">
									<span>[[telefono.numero_telefono]]</span>
								</span>
								<p><b>Estado:</b> [[empresa.nombre_estado]]</p>
								<p><b>Correo:</b> [[empresa.correo_empresa]]</p>
								<p><b>Web:</b> <a ng-href="[[empresa.web_empresa]]"> [[empresa.web_empresa]] </a></p>
								<br>
								<div class="row">
									<div class="col-md-1 icon-redes-sociales">
										<i class="fa fa-facebook-square"></i>
									</div>
									<div class="col-md-1 icon-redes-sociales">
										<i class="fa fa-twitter-square"></i>
									</div>
									<div class="col-md-1 icon-redes-sociales">
										<i class="fa fa-instagram"></i>
									</div>
								</div>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Detalle</a></li>
								<li class=""><a href="#mapa" data-toggle="tab">Dirección</a></li>
								<li class=""><a href="#productos" data-toggle="tab">Productos</a></li>
								<li class=""><a href="#servicios" data-toggle="tab">Servicios</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details">
								<p>[[empresa.descripcion_empresa]]</p>
							</div>
							
							<div class="tab-pane fade" id="mapa">
								
								<p>[[empresa.direccion_empresa]]</p>
								<p><b>[[empresa.nombre_estado]]</b></p>
								<div ng-init="mapa = {id : 0, coords : { latitude: [[empresa.latitud_empresa]], longitude: [[empresa.longitud_empresa]] } }"></div>
		                    	<div ng-init="mapa_posicion = { zoom: 9, center : { latitude: [[empresa.latitud_empresa]], longitude: [[empresa.longitud_empresa]]} }"></div>
								<div class="row">
									<div class="col-lg-12 col-md-12 col-xs-12 col-maps">
				                        <section class="panel panel-map">
				                            <header class="panel-heading-maps">
				                                <div id="map_canvas">
				                                    <ui-gmap-google-map 
				                                        center="mapa_posicion.center" 
				                                        zoom="mapa_posicion.zoom" 
				                                        draggable="true" 
				                                        options="options">
				                                            <ui-gmap-marker 
				                                                coords="mapa.coords" 
				                                                idkey="mapa.id">
				                                            </ui-gmap-marker>
				                                    </ui-gmap-google-map>
				                                </div>
				                            </header>
				                        </section>
				                    </div>
			                    </div>
							</div>
							
							<div class="tab-pane fade" id="productos">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery1.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery2.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery3.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery4.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="servicios">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery1.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery2.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery3.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{ asset('/cart/Eshopper/images/home/gallery4.jpg') }}" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<!--<div class="recommended_items">
						<h2 class="title text-center">Empresas relacionados</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend1.jpg') }}" alt="">
													<h5>Nombre Empresa</h5>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend2.jpg') }}" alt="">
													<h5>Nombre Empresa</h5>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend3.jpg') }}" alt="">
													<h5>Nombre Empresa</h5>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</button>
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
													<h5>Nombre Empresa</h5>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend2.jpg')}}" alt="">
													<h5>Nombre Empresa</h5>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('/cart/Eshopper/images/home/recommend3.jpg') }}" alt="">
													<h5>Nombre Empresa</h5>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</button>
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