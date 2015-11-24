@extends('base-admin')


@section('content')
	<div class="container">

		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
				
		<div class="row">
			<div class="col-md-8"> <h2>Lista de empresas</h2></div>
			<div class="col-md-4">
				<a class="btn btn-sm btn-success" href="{{ url( '/empresas/create' ) }}"> Agregar</a>
			</div>

		</div>
		<br>
		<br>

		<table class="table table-hover">
		    <thead>
		      <tr>
				<th> nombre</th>
				<th> correo</th>
				<th> web</th>
		        <th> Operaciones</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($empresas as $empresa)
			    	<tr>
						<td>{{$empresa->nombre_empresa}}</td>
						<td>{{$empresa->correo_empresa}}</td>
			        	<td>{{$empresa->correo_empresa}}</td>
			        	<td >
			        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$empresa->id_empresa ) }}"> Detalle</a>
			        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$empresa->id_empresa.'/edit' ) }}"> Editar </a>	        		
			        	</td>
			        </tr>
				@endforeach
		    </tbody>
		</table>

	</div>
	
@stop