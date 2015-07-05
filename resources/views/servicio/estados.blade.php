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
				                           <i class="fa fa-globe"></i> Estados
				                        </h2>
				                    </div>
				                </div>

				                <div class="row">
				                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				                        <div class="panel">
				                            <div class="panel-body">
				                                <ul class="list-group">
				                                    
				                                    <a class="list-group-item" href="{{ url ('servicios/estado/sucre')}}">
				                                        <span class="badge badge-danger">14</span>
				                                        Sucre                  
				                                    </a>
				                                   
				                                    <a class="list-group-item" href="{{ url ('servicios/estado/miranda')}}">
				                                        <span class="badge badge-primary">1</span>
				                                        Miranda
				                                    </a>
				                                    <a class="list-group-item" href="{ url ('servicios/estado/bolivar')}}">
				                                        <span class="badge badge-info">24</span>
				                                        Bolivar
				                                    </a>
				                                    <a class="list-group-item" href="{ url ('servicios/estado/anzoategui')}}">
				                                        <span class="badge badge-warning">44</span>
				                                        Anzoategui
				                                    </a>
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