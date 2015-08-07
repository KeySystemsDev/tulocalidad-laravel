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
								
								<ol class="breadcrumb">
					                <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicios</a></li>
					                <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-globe"></i> {{$id_estado}}</a></li>
					                <li class="active"><i class="fa fa-location-arrow"></i> Categorias</li>
					            </ol>
								<div class="row">
									<div class="col-xs-12">
										<div class="panel">
				                            <div class="panel-body">				                                
				                                <ul class="list-group col-lg-4">				                                    
				                                    @foreach(array_slice($categorias, 0, $i) as $key)
														<a class="list-group-item" href="/servicios/categoria/{{strtolower($id_estado)}}/{{strtolower($key->nombre_categoria)}}">
					                                        <span class="badge badge-success">{{$key->cantidad}}</span>
					                                        {{$key->nombre_categoria}}					                                        
					                                    </a>
				                                    @endforeach
				                                </ul>
				                                <ul class="list-group col-lg-4">
				                                    @foreach(array_slice($categorias, $i, $i) as $key)
														<a class="list-group-item" href="/servicios/categoria/{{strtolower($id_estado)}}/{{strtolower($key->nombre_categoria)}}">
					                                        <span class="badge badge-success">{{$key->cantidad}}</span>					                                        
					                                        {{$key->nombre_categoria}}	
					                                    </a>
				                                    @endforeach
				                                </ul>
				                                <ul class="list-group col-lg-4">
				                                    @foreach(array_slice($categorias, $i * 2, $i) as $key)
														<a class="list-group-item" href="/servicios/categoria/{{strtolower($id_estado)}}/{{strtolower($key->nombre_categoria)}}">
					                                        <span class="badge badge-success">{{$key->cantidad}}</span>
					                                        {{$key->nombre_categoria}}	
					                                    </a>
				                                    @endforeach
				                                </ul>
											</div>
										</div>
									</div>
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