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
		
		<section  ng-init="array={{$productos}}">
        	<div class="row" ng-init = "url='{{url()}}'">
		        <div class="col-sm-12 padding-right">
		            <div class="features_items"><!--features_items-->
		                <div class="col-sm-3" ng-repeat="item in array.data">
		                    <div class="product-image-wrapper">
		                        <div class="single-products">
		                            <div class="productinfo text-center">

		                                <img ng-src="[[ url + '/uploads/productos/high/'+ item.primera_imagen.nombre_imagen_producto]]" alt="">
		                                <h2>[[item.precio_producto]] BsF</h2>
		                                <p>[[item.nombre_producto]].</p>
		                                <div class="row">
		                                	<div class="col-md-4"></div>
		                                	<div class="col-md-2">
			                                	<a href="[[ url + '/empresas/' + item.id_empresa + '/productos/' + item.id_producto ]]" class="btn btn-default btn-info-hover" data-toggle="tooltip" data-title="Detalle"><i class="fa fa-bars"></i></a>
			                                </div>
			                                <div class="col-md-2">
			                                	<a href="[[ url + '/empresas/' + item.id_empresa + '/productos/' + item.id_producto + '/edit']]" class="btn btn-default btn-success-hover" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
			                            	</div>
			                            </div>
		                            	<br>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>

		</section>
		<ul class="pagination">
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
		
    </div><!-- content -->
	
</div>
@endsection
