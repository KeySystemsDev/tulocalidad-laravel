@extends('base-admin')


@section('content')
	<div class="container">
		@include('layouts/navbar-admin')

		<br>
		<br>
		<br>
		<br>

		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
				
		<div class="row">
			<div class="col-md-8"> <h2>Lista de Redes Sociales</h2></div>
			<div class="col-md-4">
				<a class="btn btn-sm btn-success" href="{{  url('/redes_sociales/create') }}"> Agregar</a>
			</div>

		</div>
		<br>
		<br>

		<table class="table table-hover">
		    <thead>
		      <tr>
				<th> Nombre </th>
				<th> Url </th>
		        <th> Operaciones </th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($redes as $red)
			    	<tr>
						<td>{{$red->nombre_red_social}}</td>
						<td>{{$red->url_red_social}}</td>
			        	<td >
			        		<a class="btn btn-sm btn-info" href="{{ url( '/redes_sociales/'.$red->id_red_social ) }}"> Detalle</a>
			        		<a class="btn btn-sm btn-info" href="{{ url( '/redes_sociales/'.$red->id_red_social.'/edit' ) }}"> Editar </a>	        		
			        		<a class="btn btn-sm btn-info" href="{{ url( '/redes_sociales/'.$red->id_red_social.'/destroy' ) }}"> desHabilitar </a>	        		
			        	</td>
			        </tr>
				@endforeach
		    </tbody>
		</table>

	</div>
	
@stop