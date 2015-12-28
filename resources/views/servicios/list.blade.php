@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{  url('/empresas/'.$id_empresa.'/servicios/create') }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Agregar Servicios">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </ol>
        

        <h1 class="page-header"><i class="fa fa-coffee"></i> Lista de Servicios </h1>
        
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')

		<section>
        	<div class="row">
		        <div class="col-sm-12 padding-right">
		            <div class="features_items"><!--features_items-->
		                @foreach($servicios as $servicio)
		                <div class="col-sm-3">
		                    <div class="product-image-wrapper">
		                        <div class="single-products">
		                            <div class="productinfo text-center">
		                                <img src="{{ asset('/cart/Eshopper/images/shop/product12.jpg') }}" alt="">
		                                <h2>{{$servicio->precio_servicio}} BsF</h2>
		                                <p>{{$servicio->nombre_servicio}}.</p>
		                                <div class="row">
		                                	<div class="col-md-4"></div>
		                                	<div class="col-md-2">
			                                	<a href="{{ url( '/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio ) }}" class="btn btn-default btn-info-hover" data-toggle="tooltip" data-title="Detalle"><i class="fa fa-bars"></i></a>
			                                </div>
			                                <div class="col-md-2">
			                                	<a href="{{ url( '/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio ) }}" class="btn btn-default btn-success-hover" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
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