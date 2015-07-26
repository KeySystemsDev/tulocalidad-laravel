@extends('base')

@section('js')
	<script src="{{ asset('/js/controllers/empresa/empresa_registro.js') }}"></script>
@endsection

@section('content')

<div ng-controller="EmpresaRegistroController">
	
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
		                        Formulario de Registro de Empresa
		                    </h2>
		                    <p>
		                    	Registra tu empresa para el directorio
		                    </p>
                    	</header>
                    </section>
                </div>

                <div class="col-lg-12">
                    <section class="panel">                         
                        <div class="panel-body">
							<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" role="form" name="formulario" id="formulario" action="agregar-exitoso" method ="post">

								<div class="form-group">
					      			<label class="control-label col-lg-3">Nombre Empresa</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-coffee" data-original-title="" title=""></i>
					      				<input type="text" maxlength="100" class="form-control" placeholder="Nombre de la Empresa" name="i_nombre" ng-model="formData.i_nombre" required>
					    			</div>
					    		</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Imagen de perfil</label>
									<input type="hidden" name="namefile" id="namefile" ng-model="formData.namefile" ng-update-hidden required>
									<div class="col-sm-9 iconic-input right">

										<div class="fileinput fileinput-new" data-provides="fileinput">
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
										</div>
									</div>
								</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">Rif</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-flag" data-original-title="" title=""></i>
					      				<input type="text" data-mask="a-99999999-9" placeholder="J-12345678-9" class="form-control" name="i_rif" ng-model="formData.i_rif" required>
					    			</div>
					    		</div>

								<div class="form-group">
									<label class="control-label col-lg-3">Descripción</label>
									<div class="col-sm-9 iconic-input right">
										<textarea cols=20 rows=3 maxlength="300" class="form-control" placeholder="Descripción de la Empresa" name="i_descripcion" ng-model="formData.i_descripcion" required></textarea>
									</div>
								</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">Dirección</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<textarea cols=20 rows=3 maxlength="300" class="form-control" placeholder="Direccion de la Empresa" name="i_direccion" ng-model="formData.i_direccion" required></textarea>				      				
					    			</div>
					    		</div>

					    		<div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Categoria</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15 selectpicker" data-live-search="true" name="i_categoria">
                                            @foreach($categoria as $key)
												<option class="option" value="{{$key->id_categoria}}">{{$key->nombre_categoria}}</option>; 
											@endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono3">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono móvil</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_celular">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                  	<label for="cemail" class="control-label col-lg-3">Correo Electrónico</label>
                                  	<div class="col-lg-9 iconic-input right">
                                      	<i class="fa fa-envelope" data-original-title="" title=""></i>
                                      	<input class="form-control" type="email" placeholder="ejample@dominio.com" ng-class="{'error':formulario.i_correo.$invalid && formulario.i_correo.$touched}" name="i_correo" ng-model="formData.i_correo">
                                  		
                                  		<div class="col-lg-10" ng-show="formulario.i_correo.$dirty && formulario.i_correo.$invalid">
					        				<p class="help-block text-danger" ng-show="formulario.i_correo.$error.email">Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
					      				</div>
                                  	</div>                                 		
                              	</div>

                              	<div class="form-group">
                                    <label for="curl" class="control-label col-lg-3">Sitio Web</label>
                                    <div class="col-lg-9 iconic-input right">
                                      	<i class="fa fa-link" data-original-title="" title=""></i>
                                        <input class="form-control" type="url" placeholder="Ejemplo: http://test.com" ng-class="{'error':formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched}" name="i_sitio_web" ng-model="formData.i_sitio_web">

                                        <p class="help-block text-danger" ng-show="formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched"> Verifique la direccion: Ejemplo: http://test.com </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="id_estado" name="id_estado">
                                    <label class="control-label col-lg-3" for="inputSuccess">Estado</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" name="estado" ng-change="estado_ruta(estado)" ng-model="estado" required>
											<option value="" selected>
												Seleccione un estado
											</option>
											@foreach($estados as $key)
	                                            <option value="{{$key->id_estado}} + {{$key->latitud_estado}} + {{$key->longitud_estado}}">
	                                                {{$key->nombre_estado}}
	                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Privacidad de ubicación</label>
                                    <div class="col-lg-9">
										<div class="radio-inline">
                                            <input type="radio" name="id_privacidad" id="id_privacidad" value="1" checked>
                                            Pública
                                        </div>
										<div class="radio-inline">
                                            <input type="radio" name="id_privacidad" id="id_privacidad" value="0">
                                            Privada                                         
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="curl" class="control-label col-lg-3"></label>
                                    <div class="col-lg-9 iconic-input right">
                                      	<div class="panel panel-danger panel-drop ">
				                            <div class="panel-body">
				                                Selecione la posicion de su empresa arrastrando el marcador del mapa sobre la ubicación.
				                            </div>
				                        </div>
                                    </div>
                                </div>
      
                                <input class="form-control" type="hidden" id="i_latitud" name="i_latitud" readonly="false" placeholder="Posición en el Mapa">
                                
                                <input class="form-control" type="hidden" id="i_longitud" name="i_longitud" readonly="false" placeholder="Posición en el Mapa">
							
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
            				<button class="btn btn-success btn-lg fa fa-check" type="submit" value="Registrar" ng-disabled="formulario.$invalid"> Registrar</button>
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

@include('layouts/footer')

@endsection
