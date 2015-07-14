@extends('base')

@section('js')
    <script src="{{ asset('/js/controllers/empresa/empresa_editar.js') }}"></script>
@endsection

@section('content')

<div ng-controller="EditarEmpresaController">
	
    <div ng-init="nombre_empresa = '{{$empresa->nombre_empresa}}' "></div>
    <div ng-init="i_latitud = '{{$empresa->positionmap_empresa_latitude}}' "></div>
    <div ng-init="i_longitud = '{{$empresa->positionmap_empresa_longitude}}' "></div>
    <div ng-init="init(i_latitud , i_longitud)"></div>

    <div ng-init="id_estado_empresa = '{{$empresa->id_estado}}'"></div>

	@include('layouts/nav-top')
    
    @include('layouts/nav')

	<div class="container">
		<div id="main">
			<div class="row">

				<div class="col-lg-12 center">
                	<section class="panel">
                		<header class="panel-heading center">
		                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
		                    <h2>
		                        Actualizar Registro de Empresa
		                    </h2>
		                    <p>
		                    	Manten tus datos al día
		                    </p>
                    	</header>
                    </section>
                </div>

                <div class="col-lg-12">
                    <section class="panel">                         
                        <div class="panel-body">

							<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" action="../editar-exitoso" method="post" name="formulario" id="formulario">
		
								<input type="hidden" id="id_empresa" name="id_empresa" value="{{$empresa->id_empresa}}">
								
								<div class="form-group">
					      			<label class="control-label col-lg-3">Nombre Empresa</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-coffee" data-original-title="" title=""></i>
					      				<input type="text" maxlength="20" class="form-control" name="i_nombre" ng-value="nombre_empresa" readonly>
					    			</div>
					    		</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">RIF</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-flag" data-original-title="" title=""></i>
					      				<input type="text" maxlength="10" minlength="10" class="form-control" name="i_rif" value="{{$empresa->rif_empresa}}" readonly>
					    			</div>
					    		</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">Dirección</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-map-marker" data-original-title="" title=""></i>
					      				<input type="text" maxlength="100" class="form-control" name="i_direccion" value="{{$empresa->direccion_empresa}}" required>
					    			</div>
					    		</div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Descripción</label>
                                    <div class="col-sm-9 iconic-input right">
                                        <i class="fa fa-map-marker" data-original-title="" title=""></i>
                                        <input type="text" maxlength="100" class="form-control" name="i_descripcion" value="{{$empresa->descripcion_empresa}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Categorias</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" name="s_categoria">
                                            @foreach($categoria as $key)
												@if ($key->id_categoria == $empresa->id_categoria)
													<option class="option" value="{{ $key->id_categoria }}" selected >{{$key->nombre_categoria}} </option>;
												@else
													<option class="option" value="{{ $key->id_categoria }}">{{$key->nombre_categoria}} </option>;
												@endif

											@endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local 1</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono" value="{{$empresa->telefono_empresa}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local 2</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono2" value="{{$empresa->telefono_2_empresa}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local 3</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono3" value="{{$empresa->telefono_3_empresa}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono movil</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" data-mask="(9999) 999-99-99" class="form-control" name="i_celular" value="{{$empresa->telefono_movil_empresa}}">
                                    </div>
                                </div>

                                <div class="form-group">
                                  	<label for="cemail" class="control-label col-lg-3">Correo Electrónico</label>
                                  	<div class="col-lg-9 iconic-input right">
                                      	<i class="fa fa-envelope" data-original-title="" title=""></i>
                                      	<input type="email" class="form-control" name="i_correo" value="{{$empresa->correo_empresa}}" required>
                                    </div>                                 		
                              	</div>

                              	<div class="form-group">
                                    <label for="curl" class="control-label col-lg-3">Sitio Web</label>
                                    <div class="col-lg-9 iconic-input right">
                                      	<i class="fa fa-link" data-original-title="" title=""></i>
                                        <input type="url" class="form-control" name="i_sitio_web" value="{{$empresa->url_empresa}}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="id_estado" name="id_estado">
                                    <label class="control-label col-lg-3" for="inputSuccess">Estado</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" ng-change="estado_ruta(estado)" ng-model="estado">
                                            <option ng-repeat="estado in estados" 
                                                      value="[[estado.id_estado]] + [[estado.latitud_estado]] + [[estado.longitud_estado]]"
                                                      ng-if="[[estado.id_estado]] == [[id_estado_empresa]]" 
                                                      selected>
                                                    [[ estado.nombre_estado]]
                                            </option>
                                            <option ng-repeat="estado in estados" 
                                                    value="[[estado.id_estado]] + [[estado.latitud_estado]] + [[estado.longitud_estado]]"
                                                    ng-if="[[estado.id_estado]] != [[id_estado_empresa]]">
                                                    [[ estado.nombre_estado]]
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">latitude</label>
                                    <div class="col-sm-9 iconic-input right">
                                        <i class="fa fa-thumb-tack" data-original-title="" title=""></i>
                                        <input class="form-control" ng-value="[[i_latitud]]" type="text" id="i_latitud" name="i_latitud" readonly="false" placeholder="Posición en el Mapa">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">longitude</label>
                                    <div class="col-sm-9 iconic-input right">
                                        <i class="fa fa-thumb-tack" data-original-title="" title=""></i>
                                        <input class="form-control" ng-value="[[i_longitud]]" type="text" id="i_longitud" name="i_longitud" readonly="false" placeholder="Posición en el Mapa">
                                    </div>
                                </div>
		
						</div>
                 	</section>
              	</div>

                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
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
                    </section>
                </div>

              	<div class="col-lg-12">
                	<section class="panel">
                		<header class="panel-heading center">
            				<button class="btn btn-success btn-lg fa fa-refresh" type="submit" value="Actualizar Registro"> Actualizar Registro</button>
      					</header>
      				</section>
      			</div>

      						</form>
			
			</div>
		</div>
	</div>

</div>
@endsection