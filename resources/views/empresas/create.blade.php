@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_empresa.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="EmpresaContoller">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        @if($empresa)
        <h1 class="page-header"><i class="fa fa-briefcase"></i> Editar Empresa</h1>
        <div ng-init="empresa={{ $empresa }}"></div>
		<div ng-init="incializar_telefonos({{ $telefonos }})"></div>
		<div ng-init="incializar_redes({{ $redes_empresa }})"></div>
		<div ng-init="img = '{{ url ('/uploads/empresas/low/') }}/'+empresa.url_imagen_empresa" ></div>
		<form class="form-horizontal" action="{{ url('empresas/'.$empresa->id_empresa) }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
        @else
        <h1 class="page-header"><i class="fa fa-briefcase"></i> Crear Empresa</h1>
		<form class="form-horizontal" action="{{ url('empresas/') }}" method="POST" enctype="multipart/form-data" name="formulario" id="formulario" ng-submit="submit(formulario.$valid)" novalidate>		
		@endif

		    <div class="row">
		        <!-- begin col-12 -->
		        <div class="col-12 ui-sortable">
		            <!-- begin panel -->
		            <div class="panel panel-inverse">
		                <div class="panel-heading">
		                    <div class="panel-heading-btn">
		                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
		                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
		                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
		                    </div>
		                    <h4 class="panel-title">Empresas</h4>
		                </div>

		                <div class="panel-body">

							@include('alerts.mensaje_success')
							@include('alerts.mensaje_error')
				
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							
							<div class="well">
								<div class="form-group">
									<label class="control-label col-md-4">Imagen de perfil</label>
									<div class="col-md-5 iconic-input right">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<input type="hidden" name="namefile" id="namefile" ng-model="empresa.url_imagen_empresa" ng-value="empresa.url_imagen_empresa" ng-update-hidden required>
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
		                            <label class="col-md-4 control-label">Nombre Empresa</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.nombre_empresa" name="nombre_empresa">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Correo Empresa</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.correo_empresa" name="correo_empresa">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Descripción Empresa</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.descripcion_empresa" name="descripcion_empresa">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Pag Web Empresa</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.web_empresa" name="web_empresa">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Estado</label>
		                            <div class="col-md-5">
		                            	<select class="form-control" name="id_estado" ng-model="empresa.id_estado" required>
											<option class="option" value="">Seleccione un estado</option>
											@foreach($estados as $key)
												<option class="option" value="{{$key->id_estado}}">
													{{$key->nombre_estado}}</option>
											@endforeach
										</select>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Municipio</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.municipio_direccion" name="municipio_direccion">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Parroquia</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.parroquia_direccion" name="parroquia_direccion">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Urbanizacion</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.urbanizacion_direccion" name="urbanizacion_direccion">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">calle/avenida</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.calle_avenida_direccion" name="calle_avenida_direccion">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">casa / apto</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.casa_apto_direccion" name="casa_apto_direccion">
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">piso</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.piso_direccion" name="piso_direccion">
		                            </div>
		                        </div>
	                        </div>

	                        <div class="well">

								<center>
									<button type="button" class="btn btn-info m-r-5 m-b-5" ng-click="addPhone()"><i class="fa fa-plus"></i> Agregar telefono <i class="fa fa-phone-square"></i></button>
								</center>

								<br>

								<div class="row">
									<div class="col-md-6" ng-repeat="telefono in telefonos track by $index">
										<div class="well">
											<center><p>Telefono [[$index+1]]</p></center>
											<div class="form-group">
					                            <label class="col-md-4 control-label">Codigo</label>
					                            <div class="col-md-5">
					                            	<input type="text" class="form-control" ng-model='telefono.codigo' name="codigos[]">
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-md-4 control-label">Numero</label>
					                            <div class="col-md-5">
					                            	<input type="text" class="form-control" ng-model='telefono.numero' name="telefonos[]">
					                            </div>
					                        </div>
					                        <center>
					                        	<button class="btn btn-danger m-r-5 m-b-5" type='button' ng-click="delPhone($index)" data-toggle="tooltip" data-title="Eliminar Telefono"><i class="fa fa-trash"></i></button>
											</center>
										</div>
									</div>				
								</div>

							</div>

							<div class="well">

								<center>
									<button type="button" class="btn btn-info m-r-5 m-b-5" ng-click="addRed()"><i class="fa fa-plus"></i> Agregar Red Social</button>
								</center>

								<br>

								<div class="row">
									<div class="col-md-6" ng-repeat="red in redes track by $index">
										<div class="well">
											<center><p>Red Social</p></center>
											<div class="form-group">
					                            <label class="col-md-4 control-label">Red Social</label>
					                            <div class="col-md-5">
					                            	<select class="form-control" name="id_red_social[]" ng-model="red.id_red_social" required>
														@foreach($redes as $key)
															<option class="option" value="{{$key->id_red_social}}">
																{{$key->nombre_red_social}}</option>
														@endforeach
													</select>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-md-4 control-label">Identificador de su red social</label>
					                            <div class="col-md-5">
					                            	<input type="text" class="form-control" ng-model='red.identificador_red' name="identificador_red[]">
					                            </div>
					                        </div>
					                        <center>
					                        	<button class="btn btn-danger m-r-5 m-b-5" type='button' ng-click="delRed($index)" data-toggle="tooltip" data-title="Eliminar Telefono"><i class="fa fa-trash"></i></button>
											</center>
										</div>
									</div>				
								</div>
							</div>

							<input class="form-control" type="hidden" id="i_latitud" name="latitud_empresa" readonly="false">
                                
                            <input class="form-control" type="hidden" id="i_longitud" name="longitud_empresa" readonly="false">
                                
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-maps">
                                    <section class="panel panel-map">
                                        <header class="panel-heading-maps">
                                            <div id="map_canvas">
                                                <ui-gmap-google-map 
                                                    center="map.center" 
                                                    zoom="map.zoom" 
                                                    draggable="true" 
                                                    options="options">
                                                        <ui-gmap-marker 
                                                            coords="marker.coords" 
                                                            options="marker.options"
                                                            events="marker.events" 
                                                            idkey="marker.id">
                                                        </ui-gmap-marker>
                                                </ui-gmap-google-map>
                                            </div>
                                        </header>
                                    </section>
                                </div>
                            </div>
							
							<br>

							<center>
								@if($empresa)
								<button type="submit" class="btn btn-success m-r-5 m-b-5">Actualizar <i class="fa fa-refresh"></i></button>
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