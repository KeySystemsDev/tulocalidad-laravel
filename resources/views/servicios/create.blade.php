@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_servicio.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ServicioContoller">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
		<div ng-init="urlRedirect='{{ url('/empresas/'.$id_empresa.'/servicios')}}'"></div>

        @if($servicio)
        <ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
        	<li><a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}"><i class="fa fa-list"></i> Lista de Productos</a></li>
        	<li><i class="fa fa-pencil-square-o"></i> Editar Servicios</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

        <div ng-init="model={{ $servicio }}"></div>
		<div ng-init="img = '{{ url ('/uploads/servicios/low/') }}/'+model.url_imagen_servicio" ></div>
		<div ng-init="urlAction='{{ url('/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio) }}'"></div>		
		<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio) }}" method="POST"  enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
		
		@else
		<ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
        	<li><a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}"><i class="fa fa-list"></i> Lista de Productos</a></li>
        	<li><i class="fa fa-pencil-square-o"></i> Crear Servicios</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

		<div ng-init="urlAction='{{ url('/empresas/'.$id_empresa.'/servicios/') }}'"></div>
		<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('/empresas/'.$id_empresa.'/servicios/') }}" method="POST" enctype="multipart/form-data">		
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
	                            	<input type="text" class="form-control" ng-model="model.nombre_servicio" name="nombre_servicio" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.nombre_servicio.$invalid && (formulario.nombre_servicio.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.nombre_servicio.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Descripcion del servicio</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.descripcion_servicio" name="descripcion_servicio" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.descripcion_servicio.$invalid && (formulario.descripcion_servicio.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.descripcion_servicio.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Categoría</label>
	                            <div class="col-md-5">
	                            	<select class="form-control" name="id_categoria" ng-model="model.id_categoria" required>
										<option class="option" value="">Seleccione una categoría</option>
										@foreach($categorias as $key)
											<option class="option" value="{{$key->id_categoria_servicios1}}">
												{{$key->nombre_categoria_servicios1}}</option>
										@endforeach
									</select>
									<div class="error campo-requerido" ng-show="formulario.id_categoria.$invalid && (formulario.id_categoria.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.id_categoria.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Precio del servicio</label>
	                            <div class="col-md-5">
	                            	<input type="text" numbers-only class="form-control" ng-model="model.precio_servicio" name="precio_servicio" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.precio_servicio.$invalid && (formulario.precio_servicio.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.precio_servicio.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>
							
							<br><br>

	                        <center>
								@if($servicio)
								<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success m-r-5 m-b-5">Actualizar <i class="fa fa-refresh"></i></button>
								@else
								<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success m-r-5 m-b-5">Registrar <i class="fa fa-pencil-square-o"></i></button>
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