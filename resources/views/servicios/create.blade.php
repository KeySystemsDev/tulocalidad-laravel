@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_servicio.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ServicioContoller">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        @if($servicio)
        <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Editar Servicios </h1>

        <div ng-init="model={{ $servicio }}"></div>
		<div ng-init="img = '{{ url ('/uploads/servicios/low/') }}/'+model.url_imagen_servicio" ></div>			
		<form class="form-horizontal" action="{{ url('/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio) }}" method="POST"  enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
		
		@else
		<h1 class="page-header"><i class="fa fa-shopping-cart"></i> Crear Servicios </h1>

		<form class="form-horizontal" action="{{ url('/empresas/'.$id_empresa.'/servicios/') }}" method="POST" ng-submit="submit(formulario.$valid)"  enctype="multipart/form-data">		
		@endif

        	@include('alerts.mensaje_success')
			@include('alerts.mensaje_error')
        
	        <div class="row">

	            <div class="col-12 ui-sortable">
	                <!-- begin panel -->
	                <div class="panel panel-inverse">
	                    <div class="panel-heading">
	                        <div class="panel-heading-btn">
	                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
	                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
	                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
	                        </div>
	                        <h4 class="panel-title">Servicios </h4>
	                    </div>

	                    <div class="panel-body">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id_empresa" value="{{ $id_empresa }}">
							<br>

							<div class="form-group">
								<label class="control-label col-md-4">Imagen del Servicio</label>
								<div class="col-md-8 iconic-input right">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<input type="hidden" name="namefile" id="namefile" ng-model="model.url_imagen_servicio" ng-value="model.url_imagen_servicio" ng-update-hidden required>
										<div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
											<img class="img-responsive img-responsive-custon" ng-src="[[img]]" alt="" style="width: 200px; height: 200px;">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<button type="button" class="btn btn-success" style="width: 200px;" data-toggle="modal" data-target="#myModal">
												<span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
												Seleccionar imagen
											</button>
										</div>	
										<div class="error campo-requerido" ng-show="formulario.namefile.$invalid && (formulario.namefile.$touched || submitted)">
										<small class="error" ng-show="formulario.namefile.$error.required">
											* Campo requerido.
									    </small>
									</div>	
									</div>											
								</div>
							</div>

							<div class="form-group">
	                            <label class="col-md-4 control-label">Nombre del servicio</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.nombre_servicio" name="nombre_servicio">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Descripcion del servicio</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.descripcion_servicio" name="descripcion_servicio">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Precio del servicio</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.precio_servicio" name="precio_servicio">
	                            </div>
	                        </div>
							
							<br><br>

	                        <center>
								@if($servicio)
								<button type="submit" class="btn btn-danger m-r-5 m-b-5">Actualizar <i class="fa fa-refresh"></i></button>
								@else
								<button type="submit" class="btn btn-success m-r-5 m-b-5">Registrar <i class="fa fa-pencil-square-o"></i></button>
								@endif
							</center>
				
							@include('modals/upload_image')

						</div><!-- boby -->
	                </div>
	            </div>
	     
	        </div><!-- row -->

		</form>
    </div><!-- content -->
	
</div>
@endsection