@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">        

        <ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
            <li><a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}"><i class="fa fa-list"></i> Lista de Servicios</a></li>
            <li><i class="fa fa-coffee"></i> {{ $servicio->nombre_servicio }}</a></li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

        @include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
        
        <div class="row">

        	<div class="col-sm-12 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-4">
						<div class="view-product">
							<img src="{{ url ('/uploads/servicios/high/'.$servicio->url_imagen_servicio) }}" alt="">
						</div>
					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information-->
							<!--<img src="images/product-details/new.jpg" class="newarrival" alt="">-->
							<h2>{{ $servicio->nombre_servicio }}</h2>
							<p>Web ID: 1089772</p>
							<span>
								<span>{{ $servicio->precio_servicio }} BsF</span>
								<label type="button" class="btn btn-info cart">
									<i class="fa fa-shopping-cart"></i>
									Add to cart
								</label>
							</span>
							<p><b>Servicio:</b> Disponible</p>
							<p><b>Vendidos:</b> 2</p>
							<a href=""><img src="http://localhost:8000/cart/Eshopper/images/product-details/share.png" class="share img-responsive" alt=""></a>
						</div><!--/product-information-->
					</div>
				</div><!--/product-details-->
				
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#details" data-toggle="tab">DETAlle</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="reviews">
							<div class="col-sm-12">
								<p>{{ $servicio->descripcion_servicio}}</p>
							</div>
						</div>				
					</div>
				</div><!--/category-tab-->
			</div>
        
        </div><!-- row -->

    </div><!-- content -->
	
</div>
@endsection
