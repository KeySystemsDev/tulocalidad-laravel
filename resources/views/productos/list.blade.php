@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('/empresas/'.$id_empresa.'/productos/create') }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Agregar Productos">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </ol>
        

        <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Lista de Productos </h1>
        
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')

		<section>
        	<div class="row">
		        <div class="col-sm-12 padding-right">
		            <div class="features_items"><!--features_items-->
		                @foreach($productos as $producto)
		                <div class="col-sm-3">
		                    <div class="product-image-wrapper">
		                        <div class="single-products">
		                            <div class="productinfo text-center">
		                                <img src="{{ asset('/cart/Eshopper/images/shop/product12.jpg') }}" alt="">
		                                <h2>{{$producto->nombre_producto}} BsF</h2>
		                                <p>{{$producto->nombre_producto}}.</p>
		                                <div class="row">
		                                	<div class="col-md-4"></div>
		                                	<div class="col-md-2">
			                                	<a href="{{ url( '/empresas/'.$producto->id_empresa.'/productos/'.$producto->id_producto ) }}" class="btn btn-default btn-info-hover" data-toggle="tooltip" data-title="Detalle"><i class="fa fa-bars"></i></a>
			                                </div>
			                                <div class="col-md-2">
			                                	<a href="{{ url( '/empresas/'.$producto->id_empresa.'/productos/'.$producto->id_producto.'/edit' ) }}" class="btn btn-default btn-success-hover" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
			                            	</div>
			                            </div>
		                            	<br>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            	@endforeach
		            </div>
		        </div>
		    </div>
		</section>

    </div><!-- content -->
	
</div>
@endsection
