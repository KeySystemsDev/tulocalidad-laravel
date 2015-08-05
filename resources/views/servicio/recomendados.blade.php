@extends('base')

@section('js')
<script src="{{ asset('public/js/controllers/empresa/servicios_recomendados.js') }}"></script>
@endsection

@section('content')
	
	@include('layouts/nav-top')

	@include('layouts/nav')

	<div class="container">
		<div id="main">
			<div class="row">
			<!--
                INICIALIZACION DE VARIABLE DE REDIREECION DE PAGINACION
            -->
            <div ng-init="paginacion-href='/servicios/'"></div>
				 <div class="col-lg-12">
	                   	<section class="panel">                         
	                        <div class="panel-body">

	                        	<div class="row">
				                    <div class="col-lg-12 center">
					                	<section class="panel">
					                		<header class="panel-heading center">
							                    <img class="img-registrar-logo" src="{{ asset('public/img/tulocalidad.png') }}">
							                    <h2>
							                        Recomendados
							                    </h2>
					                    	</header>
					                    </section>
					                </div>
				                </div>
				                <div class="content">

				                    <div class="grid">
										@foreach ($data->consulta as $key)
											<figure class="effect-zoe">
												<a href="/servicios/publicacion/{{$key->id_publicidad}}">
													<img src="{{ url('/uploads/publicidades_high/'.$key->url_imagen_publicidad)}}" class="img-2">		
												</a>
												<figcaption>														
													<p class="icon-links icon-links-custon">															
														<!--<a href="#"><i class="fa fa-link"></i></a>
														<a href="#"><i class="fa fa-comment-o"></i></a>-->
														<a href="http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}" onclick="window.open('http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}', 'newwindow', 'width=500, height=250'); return false;"><i class="fa fa-twitter"></i></a>
														<a href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;">
															<i class="fa fa-facebook"></i>
														</a>
														<span style="font-size: 12px;">{{$key->titulo_publicidad}}</span>

													</p>
													<!--<p class="description">{{$key->descripcion_publicidad}}</p>-->
												</figcaption>												
											</figure>
										@endforeach
									</div>
									
			 						<center>
			                            <div class="col-lg-12">
			                                @if ($data->pages > 1)
			                                <ul  class="pagination pagination-primary pagination-separated">
			                                    @if (1 < $data->current_page )
			                                        <li>  <a href ="[[paginacionhref]]?page={{$data->current_page-1}}"><</a> </li>
			                                    @endif                                        
			                                    @for ($active = 0; $active < $data->pages; $active++)
			                                        <li><a href ="[[paginacionhref]]?page={{$active+1}}" >{{$active+1}}</a></li>
			                                    @endfor
			                                    @if ($data->current_page < $data->pages)
			                                        <li>  <a href ="[[paginacionhref]]?page={{$data->current_page+1}}">></a> </li>
			                                    @endif
			                                </ul>
			                                @endif  
			                            </div>
			                        </center>    
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