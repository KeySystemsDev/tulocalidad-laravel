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
				                <li><a href="#"><i class="fa fa-location-arrow"></i> {{ $id_estado }}</a></li>
				                <li class="active"><i class="fa fa-cubes"></i> Categorias </li>
				            </ol>
							<div class="row">
								<div class="col-xs-12">
									<div class="panel">
										<div class="panel-body">
											<ul class="list-group">
												@foreach($data as $categoria)
												<div class="col-lg-4 col-md-4 col-sm-4">
													<a class="list-group-item" href="{{ url ('servicios/categoria/'.$id_estado.'/'.$categoria->nombre_categoria)}}">
														<span class="badge badge-success">{{$categoria->cantidad}}</span>
														{{$categoria->nombre_categoria}}
													</a>
												</div>
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