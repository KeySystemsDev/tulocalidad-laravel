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
    
    <section>
        <div class="container">
            <div class="row">
                
                @include('layouts/categorias-cliente')

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Lista de Empresas</h2>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/shop/product12.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/shop/product11.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/shop/product10.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/shop/product9.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/shop/product8.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/shop/product7.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/home/product6.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/home/product5.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/home/product4.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/home/product3.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/home/product2.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="#">
                                            <img src="{{ asset('/cart/Eshopper/images/home/product1.jpg') }}" alt="">
                                        </a>
                                        <h5>Nombre Empresa</h5>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-pencil-square-o"></i>Ver detalle</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">»</a></li>
                        </ul>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
        
        <!--<h1 class="page-header"><i class="fa fa-laptop"></i> Lista de Todas las Empresas </h1>
        
        <div class="row">

            <div class="col-12 ui-sortable">

                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Empresas</h4>
                    </div>

                    <div class="panel-body">
		
						@include('alerts.mensaje_success')
						@include('alerts.mensaje_error')
								
						<table class="table table-hover">
						    <thead>
						      <tr>
								<th> nombre</th>
						        
						      </tr>
						    </thead>
						    <tbody>
						    	@foreach($empresas as $empresa)
							    	<tr>
										<td>{{$empresa->nombre_empresa}}</td>
							        	
							        </tr>
								@endforeach
						    </tbody>
						</table>
	
					</div>
                </div>
            </div>
        </div>

    </div> -->
	
</div>
@endsection
