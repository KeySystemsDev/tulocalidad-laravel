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

				                    <div class="grid">
										@foreach ($consulta as $key)
											<figure class="effect-zoe">
												<a href="/servicios/publicacion/{{$key->id_publicidad}}">
													<img src="{{ url('/uploads/publicidades_high/'.$key->url_imagen_publicidad)}}">		
												</a>
												<figcaption>														
													<p class="icon-links icon-links-custon">															
														<!--<a href="#"><i class="fa fa-link"></i></a>
														<a href="#"><i class="fa fa-comment-o"></i></a>-->
														<a href="http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}" onclick="window.open('http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}', 'newwindow', 'width=500, height=250'); return false;"><i class="fa fa-twitter"></i></a>
														<a href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;">
															<i class="fa fa-facebook-official"></i>
														</a>
														<span style="font-size: 12px;">{{$key->titulo_publicidad}}</span>

													</p>
													<!--<p class="description">{{$key->descripcion_publicidad}}</p>-->
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