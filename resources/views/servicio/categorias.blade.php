@extends('base')

@section('content')
	
	@include('layouts/nav-top-cliente')

	@include('layouts/nav-cliente')

<div class="container">
	<div id="main">
		<div class="row">
			 <div class="col-lg-12">
                   	<section class="panel">                         
                        <div class="panel-body">
							
							<ol class="breadcrumb">
				                <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicos</a></li>
				                <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-globe"></i> Estados</a></li>
				                <li class="active"><i class="fa fa-location-arrow"></i> {{ $id_estado }} </li>
				            </ol>
							<div class="row">
								<div class="col-xs-12">
									<div class="panel">
										<div class="panel-body">
											<ul class="list-group col-lg-4">
			                                    @foreach(array_slice($data, 0, 8) as $key)
													<a class="list-group-item" href="/servicios/estado/{{ $estado->nombre_estado }}">
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

@endsection