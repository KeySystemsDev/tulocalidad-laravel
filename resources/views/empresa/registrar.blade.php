@extends('base')

@section('content')

<div ng-controller="EmpresaRegistroController">

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
							<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" method="get" role="form" name="formulario" id="formulario" action="empresa-procesado" method ="post">

								<div class="form-group">
					      			<label class="control-label col-lg-3">Nombre Empresa</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-coffee" data-original-title="" title=""></i>
					      				<input type="text" maxlength="20" class="form-control" placeholder="Nombre de la Empresa" name="i_nombre" ng-model="formData.i_nombre" required>
					    			</div>
					    		</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">RIF</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-flag" data-original-title="" title=""></i>
					      				<input type="text" maxlength="10" minlength="10" class="form-control" placeholder="RIF de la Empresa" name="i_rif" ng-model="formData.i_rif" required>
					    			</div>
					    		</div>
								
					    		<div class="form-group">
					      			<label class="control-label col-lg-3">Dirección</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-map-marker" data-original-title="" title=""></i>
					      				<input type="text" maxlength="100" class="form-control" placeholder="Direccipon de la Empresa" name="i_direccion" ng-model="formData.i_direccion" required>
					    			</div>
					    		</div>

					    		<div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Categorias</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" name="i_categoria">
                                            @foreach($categoria as $value)
												<option class="option" value="{{$value->id_categoria}}">{{$value->nombre_categoria}}</option>; 
											@endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">Telefono local</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono1">
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
                                    <label class="control-label col-lg-3">Telefono movil</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(999) 999-99-99" data-mask="(999) 999-99-99" class="form-control" name="i_celular">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                  	<label for="cemail" class="control-label col-lg-3">Correo Electrónico</label>
                                  	<div class="col-lg-9 iconic-input right">
                                      	<i class="fa fa-envelope" data-original-title="" title=""></i>
                                      	<input class="form-control" type="email" placeholder="ejample@dominio.com" ng-class="{'error':formulario.i_correo.$invalid && formulario.i_correo.$touched}" name="i_correo" ng-model="formData.i_correo" required>
                                  		
                                  		<div class="col-lg-10" ng-show="formulario.i_correo.$dirty && formulario.i_correo.$invalid">
					        				<p class="help-block text-danger" ng-show="forma.i_correo.$error.required">Campo obligatorio</p>
					        				<p class="help-block text-danger" ng-show="formulario.i_correo.$error.email">Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
					      				</div>
                                  	</div>                                 		
                              	</div>

                              	<div class="form-group">
                                    <label for="curl" class="control-label col-lg-3">Sitio Web</label>
                                    <div class="col-lg-9 iconic-input right">
                                      	<i class="fa fa-link" data-original-title="" title=""></i>
                                        <input class="form-control" type="url" placeholder="Ejemplo: http://test.com" ng-class="{'error':formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched}" name="i_sitio_web" ng-model="formData.i_sitio_web" required>

                                        <p class="help-block text-danger" ng-show="formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched"> Verifique la direccion: Ejemplo: http://test.com </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Estados</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" ng-change="estado_ruta(estado)" ng-model="estado">
                                            <option ng-repeat="estado in estados" 
											  		  value="[[estado.id_estado]] + [[estado.latitud_estado]] + [[estado.longitud_estado]]"
											  		  ng-if="[[estado.id_estado]] == 10" 
											  		  selected>
											    	[[ estado.nombre_estado]]
											</option>
											<option ng-repeat="estado in estados" 
											  		value="[[estado.id_estado]] + [[estado.latitud_estado]] + [[estado.longitud_estado]]"
											  		ng-else="[[estado.id_estado]] != 10">
											    [[ estado.nombre_estado]]
											</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">latitude</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-thumb-tack" data-original-title="" title=""></i>
                                        <input class="form-control" type="text" id="i_latitud" name="i_latitud" readonly="false" placeholder="Posición en el Mapa" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-3">longitude</label>
                                    <div class="col-sm-9 iconic-input right">
                                    	<i class="fa fa-thumb-tack" data-original-title="" title=""></i>
                                        <input class="form-control" type="text" id="i_longitud" name="i_longitud" readonly="false" placeholder="Posición en el Mapa" disabled="">
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
            				<button class="btn btn-success btn-lg fa fa-check" type="submit" value="Registrar" ng-disabled="formulario.$invalid"> Registrar</button>
      					</header>
      				</section>
      			</div>
              	
              	</form>	

            </div>


		</div>
	</div>
</div>
@endsection
