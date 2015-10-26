@extends('base-cliente')

@section('content')

<div id="page-container" class="fade">
    
    @include('layouts/navbar-cliente')
    
    <!-- begin #contact -->
    <div class="content bg-silver-lighter">
        <!-- begin container -->
        <div class="container">
          <br><br>
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
													<a class="list-group-item" href="/servicios/categoria/{{$id_estado}}/{{$key->nombre_categoria}}">
				                                        <span class="badge badge-success">{{$key->cantidad}}</span>
				                                        {{$key->nombre_categoria}}					                                        
				                                    </a>
			                                    @endforeach
			                                </ul>
			                                <ul class="list-group col-lg-4">
			                                    @foreach(array_slice($categorias, $i, $i) as $key)
													<a class="list-group-item" href="/servicios/categoria/{{$id_estado}}/{{$key->nombre_categoria}}">
				                                        <span class="badge badge-success">{{$key->cantidad}}</span>					                                        
				                                        {{$key->nombre_categoria}}	
				                                    </a>
			                                    @endforeach
			                                </ul>
			                                <ul class="list-group col-lg-4">
			                                    @foreach(array_slice($categorias, $i * 2, $i) as $key)
													<a class="list-group-item" href="/servicios/categoria/{{$id_estado}}/{{$key->nombre_categoria}}">
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
        <!-- end container -->
    </div>
    <!-- end #contact -->
    
    @include('layouts/footer')

</div>
@endsection