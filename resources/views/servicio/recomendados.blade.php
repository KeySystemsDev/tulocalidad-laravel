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

	                        	<div class="row">
				                    <div class="col-lg-12">
				                        <h2 class="page-header">
				                            <i class="fa fa-bullhorn"></i> Recomendados
				                        </h2>
				                    </div>
				                </div>

				                <div class="row" id="real-estates-columns">
				                    @foreach ($consulta as $key)
				                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">			                        
				                        <div class="panel">
				                            <div class="panel-body">
				                                <a href="#"><img src="{{$key->url_imagen_publicidad}}" class="img-responsive"></a>
				                                <div class="title-realestates-columns">
				                                    <h4><a href="#"><strong>Omah Gedong Apik BGT</strong></a></h4>
				                                    <hr>
				                                    <p>Nah nek iki lagi larang soale apik-apik barange tur aku ra iso tuku wong karang jeh ngumpulke gawe nikah kie.</p>
				                                </div>
				                            </div>
				                        </div>                    	
				                    </div>
				                    @endforeach
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
@endsection