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
					                <li class="active"><i class="fa fa-globe"></i> Estados</li>
					            </ol>

				                <div class="row">
				                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				                        <div class="panel">
				                            <div class="panel-body">
				                                <ul class="list-group">
				                                    @foreach($estados as $estado)
					                                    <a class="list-group-item" href="/servicios/estado/{{ $estado->nombre_estado }}">
					                                        {{$estado->nombre_estado}}
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