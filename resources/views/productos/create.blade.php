@extends('base-admin')

@section('controller')
    <script src="{{ asset('/js/controllers/registro_producto.js') }}"></script>
@endsection

@section('content')
	<div class="container" ng-controller="uploadManyFiles">
		@include('layouts/navbar-admin')

		<br>
		<br>
		<br>
		<br>
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
		@if($producto)
			<h2>Editar Producto</h2>
            <div ng-init="model={{ $producto }}"></div>
            <div ng-init="url='{{ url() }}'"></div>
            <div ng-init="imagenes={{ $imagenes }}"></div>
			<div ng-init="inicializar_objetos( {{ $imagenes }}, '{{url('/uploads/productos/mid/')}}' )"></div>
			<form action="{{ url('/empresas/'.$id_empresa.'/productos/'.$producto->id_producto) }}" method="POST" enctype="multipart/form-data" ng-controller="CtrlImg">
			<input type="hidden" name="_method" value="PUT" >
		@else
			<h2>Crear Producto</h2>
			<form action="{{ url('/empresas/'.$id_empresa.'/productos/') }}" enctype="multipart/form-data" method="POST"  ng-controller="CtrlImg">		
		@endif
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id_empresa" value="{{ $id_empresa }}">
				<br><br>
				<div class="from-group">
					<label for="">Nombre de producto</label>
					<input type="text" class="form-control" ng-model="model.nombre_producto" name="nombre_producto">
				</div>
				<br>
				<div class="from-group">
					<label for="">Descripcion empresa</label>
					<input type="text" class="form-control" ng-model="model.descripcion_producto" name="descripcion_producto">
				</div>
				<br>
				<div class="from-group">
					<label for="">Precio</label>
					<input type="text" class="form-control" ng-model="model.precio_producto" name="precio_producto">
				</div>
				<br>		
				<div class="from-group">
					<label for="">Texto enriquecido</label>
					<input type="text" class="form-control" ng-model="model.texto_enriquecido_producto" name="texto_enriquecido_producto">
				</div>
				<div class="well-custon"> 
                    <br><br>
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
				<button class="btn btn-success btn-stm" type="submit">
					@if($producto)
						Actualizar
					@else
						Registrar
					@endif
				</button>

                               
			</form>
	</div>
@stop