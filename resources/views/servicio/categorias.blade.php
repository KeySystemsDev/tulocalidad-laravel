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
												@foreach($data as $key)
													<ul class="list-group col-lg-4">
														<a class="list-group-item" href="/servicios/categoria/{{$id_estado}}/{{$key->nombre_categoria}}">
					                                        <span class="badge badge-success">{{$key->cantidad}}</span>
					                                        {{$key->nombre_categoria}}
					                                    </a>
					                                </ul>
				                                @endforeach
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

@endsection