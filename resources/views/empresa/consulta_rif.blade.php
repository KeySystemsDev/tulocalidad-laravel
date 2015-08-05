@extends('base')

@section('content')
<div ng-controller="RifController">
	
	@include('layouts/nav-top')

	@include('layouts/nav')

	<div class="container">
		<div id="main">
			<div class="row">
				 <div class="col-lg-12">
	                    <section class="panel">                         
	                        <div class="panel-body">

		                        <div class="col-lg-12">
				                	<section class="panel">
				                		<header class="panel-heading center">
						                    <img class="img-registrar-logo" src="{{ asset('public/img/tulocalidad.png') }}">
						                    <h2>
						                        Formulario de Consulta de Rif
						                    </h2>
						                    <p>
						                    	Ingresa el rif a consultar
						                    </p>
				                    	</header>
				                    </section>
				                </div>
								
								<form class="form-horizontal tasi-form col-lg-8 col-md-push-2" action="empresa/consulta" method="get" name="formulario" id="formulario">
									
									<div class="form-group">
					      				<label class="control-label col-lg-2">RIF</label>
					      				<div class="col-sm-9 iconic-input right">
					      					<i class="fa fa-flag" data-original-title="" title=""></i>
					      					<input type="text" data-mask="a-99999999-9" class="form-control" placeholder="J-12345678-9" name="v" ng-model="formData.i_rif" required>
					    				</div>
					    			</div>

											
									
									<div class="col-lg-12">
					                	<section class="panel">
					                		<header class="panel-heading center">
					            				<button class="btn btn-danger btn-lg fa fa-search" type="submit" value="Buscar" ng-disabled="formulario.$invalid"> Buscar</button>
					      					</header>
					      				</section>
				      				</div>
								</form>

								
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
	