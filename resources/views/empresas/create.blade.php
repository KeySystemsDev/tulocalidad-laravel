@extends('base-admin')

@section('controller')
	<script src="{{ asset('/js/controllers/registro_empresa.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="EmpresaContoller">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">

		<div ng-init="urlRedirect='{{ url('/empresas')}}'"></div>
        
        @if($empresa)
        
		<ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa fa-list"></i> Lista Empresas</a></li>
            <li><i class="fa fa-pencil-square-o"></i> Editar Empresa</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

        <div ng-init="empresa={{ $empresa }}"></div>
		<div ng-init="incializar_telefonos({{ $telefonos }})"></div>
		<div ng-init="incializar_redes({{ $redes_empresa }})"></div>
		<div ng-init="img = '{{ url ('/uploads/empresas/low/') }}/'+empresa.url_imagen_empresa" ></div>
		<div ng-init="urlAction='{{ url('empresas/'.$empresa->id_empresa) }}'"></div>
		<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('empresas/'.$empresa->id_empresa) }}" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="PUT">
        @else
        
        <ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa fa-list"></i> Lista Empresas</a></li>
            <li><i class="fa fa-pencil-square-o"></i> Crear Empresa</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>
		
		<div ng-init="urlAction='{{ url('empresas/') }}'"></div>
		<form class="form-horizontal" name="formulario" id="formulario" action="{{ url('empresas/') }}" method="POST" enctype="multipart/form-data">		
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
									<label class="control-label col-md-4">Logo de empresa</label>
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
		                            <label class="col-md-4 control-label">Rif</label>
		                            <div class="col-md-5">
		                            	<input type="text" ng-remote-validate="{{url('/empresas/validrif')}}"  placeholder="J-12345678-9" ng-pattern="/^([JGVEPjgvep][-][0-9]{7,8}[-][0-9]{1})$/" ng-required="true" class="form-control" ng-model="empresa.rif_empresa" name="rif_empresa" @if($empresa) disabled @endif>
		                            	<div class="error campo-requerido" ng-show="formulario.rif_empresa.$invalid && (formulario.rif_empresa.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.rif_empresa.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                                    <small class="error" ng-show="formulario.rif_empresa.$error.pattern">
		                                        * Formato de rif invalido. Ejemplo: J-12345678-9.
		                                    </small>
		                                    <small class="error" ng-show="formulario.rif_empresa.$error.ngRemoteValidate">
		                                        * Rif en uso.
		                                    </small>		                                    
		                            	</div>
		                            </div>
		                        </div>
								
								<div class="form-group">
		                            <label class="col-md-4 control-label">Nombre de empresa</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.nombre_empresa" name="nombre_empresa" ng-required="true" ng-trim="true">
		                            	<div class="error campo-requerido" ng-show="formulario.nombre_empresa.$invalid && (formulario.nombre_empresa.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.nombre_empresa.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                            	</div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Correo electronico</label>
		                            <div class="col-md-5">
		                            	<input type="email" class="form-control" ng-model="empresa.correo_empresa" name="correo_empresa" ng-required="true">
		                            	<div class="error campo-requerido" ng-show="formulario.correo_empresa.$invalid && (formulario.correo_empresa.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.correo_empresa.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                                    <small class="error" ng-show="formulario.correo_empresa.$error.email">
		                                    	* Correo inválido correo@ejemplo.com
		                                    </small>
		                            	</div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Descripción</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.descripcion_empresa" name="descripcion_empresa" ng-required="true">
		                            	<div class="error campo-requerido" ng-show="formulario.descripcion_empresa.$invalid && (formulario.descripcion_empresa.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.descripcion_empresa.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                            	</div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Pag web</label>
		                            <div class="col-md-5">
		                            	<input type="url" class="form-control" ng-model="empresa.web_empresa" name="web_empresa">
		                            	<div class="error campo-requerido" ng-show="formulario.web_empresa.$invalid && (formulario.web_empresa.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.web_empresa.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                                    <small class="error" ng-show="formulario.web_empresa.$error.url">
		                                    	* URL inválido http://ejemplo.com
		                                    </small>
		                            	</div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Estado</label>
		                            <div class="col-md-5">
		                            	<select class="form-control" name="id_estado"  ng-required="true">
											<option class="option" value="">Seleccione un estado</option>
											@foreach($estados as $key)
												<option class="option" value="{{$key->id_estado}}" selected ng-if='empresa.id_estado=={{$key->id_estado}}'>{{$key->nombre_estado}}</option>
												<option class="option" value="{{$key->id_estado}}" ng-if='empresa.id_estado!={{$key->id_estado}}'>{{$key->nombre_estado}}</option>
											@endforeach
										</select>
										<div class="error campo-requerido" ng-show="formulario.id_estado.$invalid && (formulario.id_estado.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.id_estado.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                            	</div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <label class="col-md-4 control-label">Dirección fiscal</label>
		                            <div class="col-md-5">
		                            	<input type="text" class="form-control" ng-model="empresa.direccion_empresa" name="direccion_empresa" ng-required="true">
		                            	<div class="error campo-requerido" ng-show="formulario.direccion_empresa.$invalid && (formulario.direccion_empresa.$touched || submitted)">
		                                    <small class="error" ng-show="formulario.direccion_empresa.$error.required">
		                                        * Campo requerido.
		                                    </small>
		                            	</div>
		                            </div>
		                        </div>

	                        <div class="well">

								<center>
									<button type="button" class="btn btn-info m-r-5 m-b-5" ng-click="addPhone()"><i class="fa fa-plus"></i> Agregar telefono <i class="fa fa-phone-square"></i></button>
									<br>
									<div class="error campo-requerido" ng-show="telefonos.length == 0 && submitted">
	                                    <small class="error" >
	                                        * Debe agregar por lo menos un telefono.
	                                    </small>
	                            	</div>									
								</center>

								<br>
								<div class="row">
									<div class="col-md-6" ng-repeat="telefono in telefonos track by $index">
										<div class="well" >
											<center><p>Telefono [[$index+1]]</p></center>
					                        <div class="form-group">
					                            <label class="col-md-4 control-label">Numero</label>
					                            <div class="col-md-5">
					                            	<input type="text" data-mask="(9999)999-99-99" class="form-control" ng-model='telefono.numero' name="telefonos[[$index]]" ng-required="true">
					                            	<div class="error campo-requerido" ng-show="formulario.telefonos[[$index]].$invalid && (formulario.telefonos[[$index]].$touched || submitted)">
					                                    <small class="error" ng-show="formulario.telefonos[[$index]].$error.required">
					                                        * Campo requerido.
					                                    </small>
					                            	</div>
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
									<br>
									<div class="error campo-requerido" ng-show="redes.length == 0 && submitted">
	                                    <small class="error" >
	                                        * Debe agregar por lo menos una red social.
	                                    </small>
	                            	</div>
								</center>

								<br>

								<div class="row">
									<div class="col-md-6" ng-repeat="red in redes track by $index">
										<div class="well">
											<center><p>Red Social</p></center>
											<div class="form-group">
					                            <label class="col-md-4 control-label">Red Social</label>
					                            <div class="col-md-5">
					                            	<select class="form-control" name="id_red_social[[$index]]" ng-required="true">
														<option class="option" value="">Seleccione una red Social</option>
														@foreach($redes as $key)
															<option class="option" selected ng-if="red.id_red_social=={{$key->id_red_social}}" value="{{$key->id_red_social}}">{{$key->nombre_red_social}}</option>
															<option class="option" ng-if="red.id_red_social!={{$key->id_red_social}}" value="{{$key->id_red_social}}">{{$key->nombre_red_social}}</option>
														@endforeach
													</select>
													<div class="error campo-requerido" ng-show="formulario.id_red_social[[$index]].$invalid && (formulario.id_red_social[[$index]].$touched || submitted)">
					                                    <small class="error" ng-show="formulario.id_red_social[[$index]].$error.required">
					                                        * Campo requerido.
					                                    </small>
					                            	</div>
					                            </div>
					                        </div>
					                        <div class="form-group">
					                            <label class="col-md-4 control-label">Identificador de su red social</label>
					                            <div class="col-md-5">
					                            	<input type="text" class="form-control" ng-model='red.identificador_red' name="identificador_red[[$index]]" ng-required="true">
					                            	<div class="error campo-requerido" ng-show="formulario.identificador_red[[$index]].$invalid && (formulario.identificador_red[[$index]].$touched || submitted)">
					                                    <small class="error" ng-show="formulario.identificador_red[[$index]].$error.required">
					                                        * Campo requerido.
					                                    </small>
					                            	</div>
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