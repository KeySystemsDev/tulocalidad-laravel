@extends('base-admin')


@section('content')
	<div class="container">

		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
				
		<div class="row">
			<div class="col-md-8"> <h2>Lista de Productos</h2></div>
			<div class="col-md-4">
				<a class="btn btn-sm btn-success" href="{{  url('/empresas/'.$id_empresa.'/productos/create') }}"> Agregar</a>
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
		    	@foreach($productos as $producto)
			    	<tr>
						<td>{{$producto->nombre_producto}}</td>
						<td>{{$producto->precio_producto}}</td>
			        	<td >
			        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$producto->id_empresa.'/productos/'.$producto->id_producto ) }}"> Detalle</a>
			        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$producto->id_empresa.'/productos/'.$producto->id_producto.'/edit' ) }}"> Editar </a>	        		
			        	</td>
			        </tr>
				@endforeach
		    </tbody>
		</table>

	</div>
	
@stop