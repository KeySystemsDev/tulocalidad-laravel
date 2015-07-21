@extends('base')

@section('content')

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
						                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
						                    <br><br><br>
						                    <div class="row">
					                            <div class="col-lg-6 col-md-6 msn-no-empresa">
					                                <div class="well well-danger well-borde">
									                    Actualizado con exito!!!
					                                </div>
					                            </div>
					                        </div>
				                    	</header>
				                    </section>
				                </div>

				                <div class="col-lg-12">
				                	<section class="panel">
				                		<header class="panel-heading center">
				            				<a href="/mis-empresas">
				            					<button class="btn button-vinotinto btn-lg fa fa-arrow-left"> Volver</button>
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

	@include('layouts/footer')

@endsection