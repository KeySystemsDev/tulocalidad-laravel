@extends('base')

@section('content')

	@include('layouts/nav')
        
	<div class="container">
		<div id="main">
			<div class="row">

				<div class="col-lg-12 center">
                	<section class="panel">
                		<header class="panel-heading center">
		                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
		                    <h2>
		                        Nueva Sucursal
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

							<form class="form-horizontal tasi-form col-lg-8 col-md-push-2"action ='../nueva-sucursal', method ='post', name ='formulario'>
								<input type="hidden" id="id_empresa" name="id_empresa" value = "{{$empresa->id_empresa}}">
								
								<div class="form-group">
					      			<label class="control-label col-lg-3">Nombre Empresa</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-coffee" data-original-title="" title=""></i>
					      				<input type="text" class="form-control" maxlength="20" name="i_nombre" value="{{$empresa->nombre_empresa}}" readonly="readonly" >
					    			</div>
					    		</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">RIF</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-flag" data-original-title="" title=""></i>
					      				<input type="text" class="form-control" maxlength="10" name="i_rif" value ="{{$empresa->rif_empresa}}" readonly="readonly">
					    			</div>
					    		</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">Dirección</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-map-marker" data-original-title="" title=""></i>
					      				<input type="text" class="form-control" maxlength="100" name ="i_direccion">
					    			</div>
					    		</div>

					    		<div class="form-group">
                                    <label class="control-label col-lg-3" for="inputSuccess">Categoria</label>
                                    <div class="col-lg-9">
                                        <select class="form-control m-bot15" name="s_categoria">
                                            @foreach($categoria as $key)
												<option class="option" value="{{ $key->id_categoria }}">{{$key->nombre_categoria}} </option>;
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
				
						</div>
                 	</section>
              	</div>

              	<div class="col-lg-12">
                	<section class="panel">
                		<header class="panel-heading center">
            				<button class="btn btn-success btn-lg fa fa-check" type="submit" value="Agregar"> Agregar</button>
      					</header>
      				</section>
      			</div>
              	
              	</form>	
		
		</div>
	</div>
</div>
@endsection
