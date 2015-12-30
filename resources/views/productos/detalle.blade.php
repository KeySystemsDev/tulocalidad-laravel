@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
            <li><a href="{{ url('/empresas/'.$id_empresa.'/productos')}}"><i class="fa fa-list"></i> Lista de Productos</a></li>
            <li><i class="fa fa-shopping-cart"></i> {{ $producto->nombre_producto }}</a></li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

        @include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
        
        <div class="row">

            <div class="col-sm-12 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-4">
                        <div class="view-product">
                            <img src="http://localhost:8000/img/no-imagen.jpg" alt="">
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">
                            
                              <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item">
                                      <a href=""><img width="84" src="http://localhost:8000/img/no-imagen.jpg" alt=""></a>
                                      <a href=""><img width="84" src="http://localhost:8000/img/no-imagen.jpg" alt=""></a>
                                      <a href=""><img width="84" src="http://localhost:8000/img/no-imagen.jpg" alt=""></a>
                                    </div>
                                    <div class="item active">
                                      <a href=""><img width="84" src="http://localhost:8000/img/no-imagen.jpg" alt=""></a>
                                      <a href=""><img width="84" src="http://localhost:8000/img/no-imagen.jpg" alt=""></a>
                                      <a href=""><img width="84" src="http://localhost:8000/img/no-imagen.jpg" alt=""></a>
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
                            <h2>{{ $producto->nombre_producto }}</h2>
                            <p>Web ID: 1089772</p>
                            <span>
                                <span>{{ $producto->precio_producto }} BsF</span>
                                <button type="button" class="btn btn-info cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button>
                            </span>
                            <p><b>Disponible:</b> En existencia</p>
                            <p><b>Cantidad:</b> 10</p>
                            <p><b>Vendidos:</b> 2</p>
                            <a href=""><img src="http://localhost:8000/cart/Eshopper/images/product-details/share.png" class="share img-responsive" alt=""></a>
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
                                <p>{{ $producto->descripcion_producto }}</p>
                            </div>
                        </div>              
                    </div>
                </div><!--/category-tab-->
                
            </div>

						
            @foreach($imagenes as $imagen)
			<div class="col-md-4">
				<div class="well well-color">
					<img class="img-detalle-producto" src="{{url('/uploads/productos/mid/'.$imagen->nombre_imagen_producto)}}" alt="">
				</div>
			</div>
			@endforeach
					
        </div><!-- row -->

    </div><!-- content -->
	
</div>
@endsection
