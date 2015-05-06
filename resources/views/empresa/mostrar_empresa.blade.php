@extends('base')

@section('content')

	@include('layouts/nav')

	<div class="container">
		<div id="main">

			<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-lg-12">
			                	<section class="panel">
			                		<header class="panel-heading center">
					                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
					                    <h2>
					                        Sucursales
					                    </h2>
					                    <p>
					                    	Empresas registradas
					                    </p>
			                    	</header>
			                    </section>
			                </div>
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-coffee" data-original-title="" title=""></i> Nombre</th>                                
                                    <th><i class="fa fa-flag" data-original-title="" title=""></i> Rif</th>
                                    <th><i class="fa fa-envelope" data-original-title="" title=""></i> Correo</th>
                                    <th><i class="fa fa-phone" data-original-title="" title=""></i> Telefono</th> 
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($consulta as $value)
                                    <tr>
                                        <td><a href="#">{{$value->nombre_empresa}}</a></td>  
                                        <td><span class="label label-info label-mini">{{$value->rif_empresa}}</span></td>
                                        <td>{{$value->correo_empresa}}</td>
                                        <td>{{$value->telefono_empresa}}</td>                                       
                                        <td><a href="editar/{{$value->id_empresa}}"><button class="btn btn-primary btn-xs" data-original-title="" title=""><i class="fa fa-pencil" data-original-title="" title=""></i></button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>

                <div class="col-lg-12">
	            	<section class="panel">
	            		<header class="panel-heading center">
	        				<a href="sucursal/{{$value->id_empresa}}"><button type="button" class="btn btn-info btn-drop fa fa-plus-square-o" data-original-title="" title=""> Nueva Sucursal</button></a>
	  					</header>
	  				</section>
  				</div>

            </div>

            

		</div>
	</div>
@endsection