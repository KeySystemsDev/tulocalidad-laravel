<center><h1>Sucursales</h1></center>
	<center>
	<table border = 1>
		<thead>
		 	<th>Nombre</th>
		 	<th>Rif</th>
		 	<th>Sitio Web</th>
		 	<th>Telefono</th>
		 	<th>Telefono2</th>
		 	<th>Telefono3</th>
		 	<th>Telefono Movil</th>
		 	<th>Direccion</th>
		 	<th>Correo</th>
		 	<th>Editar</th>

		</thead>
		<tbody>
			@foreach($consulta as $value)
				<tr>
		 			<td>{{$value->nombre_empresa}}</td>
		 			<td>{{$value->rif_empresa}}</td>
		 			<td>{{$value->url_empresa}}</td>
		 			<td>{{$value->telefono_empresa}}</td>
		 			<td>{{$value->telefono_2_empresa}}</td>
		 			<td>{{$value->telefono_3_empresa}}</td>
		 			<td>{{$value->telefono_movil_empresa}}</td>
		 			<td>{{$value->direccion_empresa}}</td>
		 			<td>{{$value->correo_empresa}}</td>
		 			<td><a href="editar/{{$value->id_empresa}}">Editar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table><BR>
	<a href="sucursal/{{$value->id_empresa}}">Nueva Sucursal</a></center>
