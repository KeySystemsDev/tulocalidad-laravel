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

		<ol class="breadcrumb navegacion-admin pull-left">
            <li><i class="fa fa fa-list"></i> Lista Empresas</li>
        </ol>

        <h1 class="page-header page-header-new">.</h1>
        
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
		                                	<div class="btn-gestionar">
			                                	<a href="[[url+'empresas/'+item.id_empresa+'/servicios']]" class="btn btn-default btn-info-hover"><i class="fa fa-coffee"></i> Servicios</a>
			                               
			                                	<a href="[[url+'empresas/'+item.id_empresa+'/productos']]" class="btn btn-default btn-info-hover"><i class="fa fa-shopping-cart"></i> Productos</a>
			                                </div>
			                            </div>		                                
			                            <br>	
		                                <div class="row">
		                                	<div class="col-md-2 col-md-offset-3">
			                                	<a href="[[url+'empresas/'+item.id_empresa]]" class="btn btn-default btn-info-hover" data-toggle="tooltip" data-title="Detalle"><i class="fa fa-bars"></i></a>
			                                </div>
			                                <div class="col-md-2">
			                                	<a href="[[url+'empresas/'+item.id_empresa+'/edit']]" class="btn btn-default btn-success-hover" data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
			                            	</div>
			                                <div class="col-md-2">
			                                	<a href="[[url+'empresas/'+item.id_empresa+'/destroy']]" class="btn btn-default btn-danger-hover" data-toggle="tooltip" data-title="Eliminar"><i class="fa fa-trash-o"></i></a>
			                            	</div>
			                   				<div class="col-md-2" ng-if="!item.habilitado_mercadopago">
			                                	<a href="[[url+'empresas/'+item.id_empresa]]" class="btn btn-danger" data-toggle="tooltip" data-title="No ha configurado un metodo de pago."><i class="fa fa-exclamation-triangle"></i></a>
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

		 <section id="do_action" ng-if="array.data.length == 0">
			<div class="row">
				<div class="col-md-12 cart-none">
					<i class="fa fa-briefcase"></i>
					<h1> No tiene Empresas Registradas.</h1>
				</div>
			</div>
		</section>

    </div><!-- content -->

   
	
</div>
@endsection
