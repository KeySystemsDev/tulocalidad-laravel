@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url( '/empresas/create' ) }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Agregar Empresas">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </ol>
        
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')

        <h1 class="page-header"><i class="fa fa-laptop"></i> Lista de Empresas </h1>
        <div ng-init="url='{{url()}}/'" ></div>
        <section  ng-init="array={{ $empresas}}">
        	<div class="row">
		        <div class="col-12 padding-right">
		            <div class="features_items"><!--features_items-->
		                <div class="col-sm-4" ng-repeat="item in array.data ">
		                    <div class="product-image-wrapper">
		                        <div class="single-products">
		                            <div class="productinfo text-center">
		                                <img src="{{ asset('/uploads/empresas/high/')}}/[[item.url_imagen_empresa]]" alt="">
		                                <h5>[[item.nombre_empresa]].</h5>
		                                <p>[[item.rif_empresa]].</p>
		                                <div class="row">
		                                	<div class="col-md-3"></div>
		                                	<div class="col-md-2">
			                                	<a href="[[url+'empresas/'+item.id_empresa]]" class="btn btn-default btn-info-hover" data-toggle="tooltip" data-title="Detalle"><i class="fa fa-bars"></i></a>
			                                </div>
			                                <div class="col-md-2">
			                                	<a href="[[url+'empresas/'+item.id_empresa+'/edit']]" class="btn btn-default btn-success-hover" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
			                            	</div>
			                                <div class="col-md-2">
			                                	<a href="[[url+'empresas/'+item.id_empresa+'/destroy']]" class="btn btn-default btn-danger-hover" data-toggle="tooltip" data-title="Eliminar"><i class="fa fa-trash-o"></i></a>
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
		<ul class="pagination" ng-if="array.total">
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
