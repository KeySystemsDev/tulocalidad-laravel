@extends('base-admin')

@section('controller')
    <script src="{{ asset('/js/controllers/registro_producto.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="uploadManyFiles">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        @if($producto)
        <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Editar Producto </h1>

        <div ng-init="model={{ $producto }}"></div>
        <div ng-init="url='{{ url() }}'"></div>
        <div ng-init="imagenes={{ $imagenes }}"></div>
		<div ng-init="inicializar_objetos( {{ $imagenes }}, '{{url('/uploads/productos/mid/')}}' )"></div>
		<form class="form-horizontal" action="{{ url('/empresas/'.$id_empresa.'/productos/'.$producto->id_producto) }}" method="POST" enctype="multipart/form-data" ng-controller="CtrlImg">
		<input type="hidden" name="_method" value="PUT" >
		
		@else
		<h1 class="page-header"><i class="fa fa-shopping-cart"></i> Crear Producto </h1>

		<form class="form-horizontal" action="{{ url('/empresas/'.$id_empresa.'/productos/') }}" enctype="multipart/form-data" method="POST"  ng-controller="CtrlImg">		
		
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
	                        <h4 class="panel-title">Producto </h4>
	                    </div>

	                    <div class="panel-body">

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id_empresa" value="{{ $id_empresa }}">

							<div class="form-group">
	                            <label class="col-md-4 control-label">Nombre de producto</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.nombre_producto" name="nombre_producto">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Descripcion empresa</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.descripcion_producto" name="descripcion_producto">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Precio</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.precio_producto" name="precio_producto">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Cantidad</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.cantidad" name="texto_enriquecido_producto">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Texto enriquecido</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.texto_enriquecido_producto" name="texto_enriquecido_producto">
	                            </div>
	                        </div>
							
							<br>
							<blockquote class="f-s-14">
		                        <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery.<br>
		                        Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
		                        Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>
		                    </blockquote>

							<div class="well-custon"> 
			                    <br>
			                    <center>
			                        <button type="button" class="btn btn-success" ng-click="agregar()">
			                            <i class="fa fa-plus"></i>
			                            <span>Agregar imagen adicional </span>
			                        </button>                                        
			                    </center>
			                    <br><br>
			                    <div class="row">
		                            <input type="hidden" name="_token" value = "{{csrf_token()}}"/>
		                            <div class="col-lg-3 col-md-4 col-xs-6 thumb" ng-repeat="objeto in objetos">
		                                <div class="thumbnail" href="#">
		                                    <input type="hidden" name="imagen[]" ng-model="objeto.url_imagen" ng-value="objeto.url_imagen"/>
		                                    <img class="img-responsive img-responsive-custon" ng-src="[[objeto.img]]" alt="">
		                                    <br>
		                                    <div class="btn-group-sm">
		                                        <button ng-if="objeto.editado" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" ng-click="actualizar($index)" ng-disabled="objeto.cargando">
		                                            <span ng-show="objeto.cargando" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
		                                            <i class="fa fa-picture-o"></i>
		                                            Seleccionar
		                                        </button>
		                                        <button type="button" class="btn btn-danger" ng-click="confirmacion_eliminar($index,{{$id_empresa}},[[model.id_producto]], [[objeto.id_imagen]])">
		                                            <i class="fa fa-trash"></i> Borrar
		                                        </button>
		                                    </div>
		                                </div>
		                            </div>
			                    </div>
			                </div>

			                @include('modals/upload_image')
			                @include('modals/validacion_modal')
			                @include('modals/confirmacion_modal')

							<br>

							<center>
								@if($producto)
								<button type="submit" class="btn btn-danger m-r-5 m-b-5">Actualizar <i class="fa fa-refresh"></i></button>
								@else
								<button type="submit" class="btn btn-success m-r-5 m-b-5">Registrar <i class="fa fa-pencil-square-o"></i></button>
								@endif
							</center>

						</div><!-- boby -->
	                </div>
	            </div>
	     
	        </div><!-- row -->

		</form>
    </div><!-- content -->
	
</div>
@endsection
