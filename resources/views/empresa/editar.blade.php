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
    <div ng-init="img='{{$empresa->icon_empresa}}'"></div>

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
                                    <label class="control-label col-lg-3">Imagen de perfil</label>
                                    <input type="hidden" name="namefile" id="namefile" ng-model="formData.namefile" ng-update-hidden required>
                                    <div class="col-sm-9 iconic-input right">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img class="img-responsive img-responsive-custon" ng-src="[[img]]" alt="">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                <button type="button" class="btn btn-success" style="width: 200px;" data-toggle="modal" data-target="#myModal">
                                                    <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
                                                    Seleccionar imagen
                                                </button>
                                            </div>
                                        </div>
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
                                        <select class="form-control m-bot15 selectpicker" data-live-search="true" name="s_categoria">
                                            @foreach($categoria as $key)
												<option class="option" value="{{ $key->id_categoria }}" @if ($key->id_categoria == $empresa->id_categoria) selected @endif>{{$key->nombre_categoria}} </option>;
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
                                      	<input type="email" class="form-control" name="i_correo" value="{{$empresa->correo_empresa}}">
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
                                        <select class="form-control m-bot15" name="estado" ng-change="estado_ruta(estado)" ng-model="estado" ng-cloak="">
                                            @foreach($estados as $key)
                                                <option @if($key->id_estado === $empresa->id_estado) 
                                                            ng-init="estado='{{$key->id_estado}} + {{$key->latitud_estado}} + {{$key->longitud_estado}}'" @endif
                                                    value="{{$key->id_estado}} + {{$key->latitud_estado}} + {{$key->longitud_estado}}">
                                                    {{$key->nombre_estado}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                        
                                <input class="form-control" ng-value="[[i_latitud]]" type="hidden" id="i_latitud" name="i_latitud" readonly="false" placeholder="Posición en el Mapa" required>
                                
                                <input class="form-control" ng-value="[[i_longitud]]" type="hidden" id="i_longitud" name="i_longitud" readonly="false" placeholder="Posición en el Mapa" required>
		
                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Dirección del Mapa</label>
                                    <div class="col-lg-9">
                                        <div class="radio-inline">
                                            <input type="radio" name="id_privacidad" id="id_privacidad" value="1" @if($empresa->privacidad_empresa) checked @endif>
                                            Pública
                                        </div>
                                        <div class="radio-inline">
                                            <input type="radio" name="id_privacidad" id="id_privacidad" value="0" @if(!$empresa->privacidad_empresa) checked @endif>
                                            Privada                                         
                                        </div>
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


    <!-- Modal -->
    <div class="modal fade .bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-picture-o"></i> Agregar Imágen de la Empresa</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="registro" method="post">
                            <div class = "row">
                                <div class="col-12">
                                    <div class="center">
                                        <span class="btn btn-success btn-file"><i class="fa fa-picture-o"></i> Seleccionar Archivo
                                        <input type="file" name="i_image" file-model="myFile" id="fileInput"/>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-xs-5 col-xs-offset-1 text-img-cortar">
                                    <i class="fa fa-file-image-o"></i>Imagen Original
                                </div>
                                <div class="col-xs-5 col-xs-offset-1 text-img-cortar">
                                    <i class="fa fa-scissors"></i> Pre visualizar Recorte
                                </div>
                                <div class="cropArea col-xs-5 col-xs-offset-1">
                                    <img-crop area-type="square" image="myImage" result-image-size="700" result-image-quality="1" result-image='srcimg'></img-crop>

                                </div>
                                <div class="col-xs-5 col-xs-offset-1">
                                    <div><img class="view-modal-img" ng-src="[[srcimg ]]"/></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" ng-disabled="disable===true" class="btn btn-primary" ng-click="return_img(img_select)">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection