@extends('base')

@section('content')

<div ng-controller="PublicidadController">

	@include('layouts/nav')
		
		<div class="container">
			<div id="main">
				<div class="row">
					 
                    <div class="col-lg-12">
	                	<section class="panel">
	                		<header class="panel-heading center">
			                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
			                    <h2>
			                        Publicidad
			                    </h2>
			                    <p>
			                    	Nueva Campaña Publicitaria
			                    </p>		                    
	                    	</header>
	                    </section>
	                </div>

					<div class="col-lg-12">
	                    <section class="panel">                         
	                        <div class="panel-body">
									
								<center><h3>Empresa {{$nombre->nombre_empresa}}</h3></center>
		
								<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" id="publicidad" action="../publicidad-creado" method="post" name="publicidad" enctype="multipart/form-data">
		
									<input type="hidden" name="id_empresa"><br>

									<div class="form-group">
						      			<label class="control-label col-lg-3">Titulo</label>
						      			<div class="col-sm-9 iconic-input right">
						      				<i class="fa fa-pencil-square-o" data-original-title="" title=""></i>
						      				<input type="text" maxlength="20" class="form-control" placeholder="Titulo" name="i_titulo" ng-model="formData.i_titulo" required>
						    			</div>
					    			</div>

					    			<div class="form-group">
						      			<label class="control-label col-lg-3">Descripción de la Campaña</label>
						      			<div class="col-sm-9 iconic-input right">
						    				<textarea cols=20 rows=3 class="form-control" name="i_descripcion" ng-model="formData.i_descripcion" required></textarea>
						    			</div>
					    			</div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Imagen de Publicidad</label>
                                        <div class="col-md-9">
                                            
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
											  	<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											    	<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="...">
											  	</div>
											  	<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										  		<div>
										    		<span class="btn btn-default btn-file">
										    			<span class="fileinput-new">Select image</span>
										    			<span class="fileinput-exists"><i class="fa fa-undo"></i> Change</span>
										    			<input type="file" name="i_publicidad">
										    		</span>
										    		<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i>Remove</a>
										  		</div>
											</div>
                                    	
                                    	</div>
                                	</div>		
									
							</div>
	                 	</section>
	              	</div>
					
					<div class="col-lg-12">
	                	<section class="panel">
	                		<header class="panel-heading center">
	            				<button class="btn btn-success btn-lg fa fa-check" type="submit" value="Agregar" ng-disabled="publicidad.$invalid"> Agregar</button>
	      					</header>
	      				</section>
      				</div>

      							</form>
			</div>
		</div>
	</div>

</div>
@endsection