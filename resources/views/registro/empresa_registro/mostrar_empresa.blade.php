<center><h1>Sucursales</h1></center>
	<center>
	<table border = 1>
		<thead>
		 	<th>Nombre</th>
		 	<th>Rif</th>
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
		 			<td>{{$value->telefono_empresa}}</td>
		 			<td>{{$value->telefono_2_empresa}}</td>
		 			<td>{{$value->telefono_3_empresa}}</td>
		 			<td>{{$value->telefono_movil_empresa}}</td>
		 			<td>{{$value->direccion_empresa}}</td>
		 			<td>{{$value->correo_empresa}}</td>
		 			<td><input type = "button"id="{{$value->id_empresa}}" value ="Editar" onclick="editarempresa(this.id)"></td>
				</tr>
			@endforeach
		</tbody>
	</table><BR>
	<a href="nueva_sucursal">Nueva Sucursal</a></center>
	<script>
		function editarempresa(id_empresa)
		{
			window.location.href="editar/"+id_empresa;
		}
	</script>