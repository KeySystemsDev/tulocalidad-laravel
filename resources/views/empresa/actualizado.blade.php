@extends('base')

@section('content')

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
						                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
						                    <h2>
						                        Actualizado con exito
						                    </h2>
				                    	</header>
				                    </section>
				                </div>

				                <div class="col-lg-12">
				                	<section class="panel">
				                		<header class="panel-heading center">
				            				<a href="../misempresas/listar?v={{$rif}}">
				            					<button class="btn btn-danger btn-lg fa fa-arrow-left"> Volver</button>
											</a>			      					
				      					</header>
				      				</section>
			      				</div>


							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection