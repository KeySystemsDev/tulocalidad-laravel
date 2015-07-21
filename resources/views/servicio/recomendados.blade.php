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

	                        	<div class="row">
				                    <div class="col-lg-12 center">
					                	<section class="panel">
					                		<header class="panel-heading center">
							                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
							                    <h2>
							                        Recomendados
							                    </h2>
					                    	</header>
					                    </section>
					                </div>
				                </div>
				                <div class="content">
				                	{{print_r($consulta)}}
				                    <div class="grid">
										@foreach ($consulta as $key)

										<figure class="effect-duke">
											<img src="{{ url($key->url_imagen_publicidad)}}" alt="img27"/>
											<figcaption>
												<!--<h2><span>{{$key->titulo_publicidad}}</span></h2>-->
												<p>
													{{$key->titulo_publicidad}}
													{{$key->descripcion_publicidad}}
												</p>
												<a href="/servicios/empresa/{{$key->id_empresa}}">View more</a>
											</figcaption>			
										</figure>
										@endforeach
									</div>
		                    
				                    <!-- start:pagination -->
				                    <!--<div class="col-lg-12">
				                        <ul class="pagination pagination-primary pagination-separated">
				                            <li><a href="#">«</a></li>
				                            <li><a href="#">1</a></li>
				                            <li><a href="#">2</a></li>
				                            <li><a href="#">3</a></li>
				                            <li><a href="#">»</a></li>
				                        </ul>
				                    </div>-->
				                    <!-- end:pagination -->
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