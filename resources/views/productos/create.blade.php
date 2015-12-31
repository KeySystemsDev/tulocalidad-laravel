@extends('base-admin')

@section('controller')
    <script src="{{ asset('/js/controllers/registro_producto.js') }}"></script>
@endsection

@section('js')
<script src="{{ asset('/bower_components/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="uploadManyFiles">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">

		<div ng-init="urlRedirect='{{ url('/empresas/'.$id_empresa.'/productos')}}'"></div>
        
        @if($producto)
        <ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
        	<li><a href="{{ url('/empresas/'.$id_empresa.'/productos')}}"><i class="fa fa-list"></i> Lista de Productos</a></li>
        	<li><i class="fa fa-pencil-square-o"></i> Editar Producto</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

        <div ng-init="model={{ $producto }}"></div>
        <div ng-init="url='{{ url() }}'"></div>
        <div ng-init="imagenes={{ $imagenes }}"></div>
		<div ng-init="inicializar_objetos( {{ $imagenes }}, '{{url('/uploads/productos/mid/')}}' )"></div>
		<div ng-init="urlAction='{{ url('/empresas/'.$id_empresa.'/productos/'.$producto->id_producto) }}'"></div>
		<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('/empresas/'.$id_empresa.'/productos/'.$producto->id_producto) }}" method="POST" enctype="multipart/form-data" ng-controller="CtrlImg">
		<input type="hidden" name="_method" value="PUT" >
		
		@else
		<ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><a href="{{ url('empresas/'.$id_empresa) }}"><i class="fa fa-briefcase"></i> {{$nombre_empresa}}</a></li>
        	<li><a href="{{ url('/empresas/'.$id_empresa.'/productos')}}"><i class="fa fa-list"></i> Lista de Productos</a></li>
        	<li><i class="fa fa-pencil-square-o"></i> Crear Producto</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>
		
		<div ng-init="urlAction='{{ url('/empresas/'.$id_empresa.'/productos/') }}'"></div>
		<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('/empresas/'.$id_empresa.'/productos/') }}" enctype="multipart/form-data" method="POST"  ng-controller="CtrlImg">		
		
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
	                            	<input type="text" class="form-control" ng-model="model.nombre_producto" name="nombre_producto" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.nombre_producto.$invalid && (formulario.nombre_producto.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.nombre_producto.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Descripción del producto</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.descripcion_producto" name="descripcion_producto" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.descripcion_producto.$invalid && (formulario.descripcion_producto.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.descripcion_producto.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Categoría</label>
	                            <div class="col-md-5">
	                            	<select class="form-control" name="id_categoria" ng-model="empresa.id_categoria" required>
										<option class="option" value="">Seleccione una categoría</option>
										@foreach($categorias as $key)
											<option class="option" value="{{$key->id_categoria_productos1}}">
												{{$key->nombre_categoria_productos1}}</option>
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
	                            <label class="col-md-4 control-label">Precio</label>
	                            <div class="col-md-5">
	                            	<input type="text" numbers-only class="form-control" ng-model="model.precio_producto" name="precio_producto" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.precio_producto.$invalid && (formulario.precio_producto.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.precio_producto.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Cantidad</label>
	                            <div class="col-md-5">
	                            	<input type="text" numbers-only class="form-control" ng-model="model.cantidad_producto" name="cantidad_producto" ng-required="true">
	                            	<div class="error campo-requerido" ng-show="formulario.cantidad_producto.$invalid && (formulario.cantidad_producto.$touched || submitted)">
	                                    <small class="error" ng-show="formulario.cantidad_producto.$error.required">
	                                        * Campo requerido.
	                                    </small>
	                            	</div>
	                            </div>
	                        </div>
							<!--
	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Texto enriquecido</label>
	                            <div class="col-md-5">
	                            	<input type="text" class="form-control" ng-model="model.texto_enriquecido_producto" name="texto_enriquecido_producto">
	                            </div>
	                        </div>
							-->
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
								<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success m-r-5 m-b-5">Actualizar <i class="fa fa-refresh"></i></button>
								@else
								<button type="button" ng-click="submit(formulario.$valid)" class="btn btn-success m-r-5 m-b-5">Registrar <i class="fa fa-pencil-square-o"></i></button>
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
