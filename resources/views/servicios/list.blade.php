@extends('base-admin')


@section('content')
	<div class="container">

		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
				
		<div class="row">
			<div class="col-md-8"> <h2>Lista de Servicios</h2></div>
			<div class="col-md-4">
				<a class="btn btn-sm btn-success" href="{{  url('/empresas/'.$id_empresa.'/servicios/create') }}"> Agregar</a>
			</div>

		</div>
		<br>
		<br>

		<table class="table table-hover">
		    <thead>
		      <tr>
				<th> nombre</th>
				<th> precio</th>
		        <th> Operaciones</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($servicios as $servicio)
			    	<tr>
						<td>{{$servicio->nombre_servicio}}</td>
						<td>{{$servicio->precio_servicio}}</td>
			        	<td >
			        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio ) }}"> Detalle</a>
			        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$id_empresa.'/servicios/'.$servicio->id_servicio.'/edit' ) }}"> Editar </a>	        		
			        	</td>
			        </tr>
				@endforeach
		    </tbody>
		</table>

	</div>
	
@stop