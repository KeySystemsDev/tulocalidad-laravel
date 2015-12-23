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
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ asset('/img/no-imagen.jpg') }}" alt="">
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<!--<img src="images/product-details/new.jpg" class="newarrival" alt="">-->
								<h2>Nombre de Empresa</h2>
								<p>RIF: 108977-2</p>
								<img src="{{ asset('/cart/Eshopper/images/product-details/rating.png') }}" alt="">
								<br>
								<span>
									<span>04127058454</span>
								</span>
								<p><b>Servicio:</b> Asesoría Informática</p>
								<p><b>Correo:</b> example@gmail.com</p>
								<p><b>URL:</b> http://example@gmail.com</p>
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
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<p><b>Write Your Review</b></p>
							</div>
							
							<div class="tab-pane fade" id="mapa">
								
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<p><b>Write Your Review</b></p>
								<div ng-init="mapa = {id : 0, coords : { latitude: '10.322782133441358', longitude: '-67.0001533203125'} }"></div>
		                    	<div ng-init="mapa_posicion = { zoom: 7, center : { latitude: '10.322782133441358', longitude: '-67.0001533203125'} }"></div>
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
					
					<div class="recommended_items"><!--recommended_items-->
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
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>

	@include('layouts/footer-cliente')

</div>
@endsection