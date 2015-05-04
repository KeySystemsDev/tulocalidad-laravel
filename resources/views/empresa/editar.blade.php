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

							<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" action='../actualizar' method='post' name='formulario'>
		
								<input type="hidden" id="id_empresa" name="id_empresa" value="{{$empresa->id_empresa}}">
								
								<div class="form-group">
					      			<label class="control-label col-lg-3">Nombre Empresa</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-coffee" data-original-title="" title=""></i>
					      				<input type="text" maxlength="20" class="form-control" name="i_nombre" value="{{$empresa->nombre_empresa}}" required>
					    			</div>
					    		</div>

					    		<div class="form-group">
					      			<label class="control-label col-lg-3">RIF</label>
					      			<div class="col-sm-9 iconic-input right">
					      				<i class="fa fa-flag" data-original-title="" title=""></i>
					      				<input type="text" maxlength="10" minlength="10" class="form-control" name="i_rif" value="{{$empresa->rif_empresa}}" required>
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
                                        <input type="text" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono1" value="{{$empresa->telefono_empresa}}">
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
                                        <input type="text" data-mask="(999) 999-99-99" class="form-control" name="i_celular" value="{{$empresa->telefono_movil_empresa}}">
                                    </div>
                                </div>

		Correo Electrónico:<input type="email" name="i_correo" value="{{$empresa->correo_empresa}}" required><br>
		Sitio Web:<input type="url"name="i_sitio_web" value="{{$empresa->url_empresa}}"><br>

		Estados:
		<select name="s_estados">
			@foreach($estados as $value)
				@if ($value->id_estado == $empresa->id_estado)
					<option class="option" value="{{ $value->id_estado }}" selected> {{$value->nombre_estado}} </option>; 
				@else
					<option class="option" value="{{ $value->id_estado }}">{{$value->nombre_estado}} </option>;
				@endif
			@endforeach
		</select>
		<br> 	
		
		<input type="submit" value="Actualizar Registro">
							
							</form>

						</div>
                 	</section>
              	</div>


			</div>
		</div>
	</div>
@endsection