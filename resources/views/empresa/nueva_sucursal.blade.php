<center><h1>Nueva Sucursal</h1>
<p>Manten tus datos al dia</p>
<form action ='../nueva-sucursal', method ='post', name ='formulario'>
	<input type="hidden" id="id_empresa" name="id_empresa" value = "{{$empresa->id_empresa}}">
	Nombre:<input type ="text", maxlength="20", name ="i_nombre", value ="{{$empresa->nombre_empresa}}" readonly="readonly" ><br>
	Rif:<input type ="text", maxlength="10", name ="i_rif", value ="{{$empresa->rif_empresa}}"  readonly="readonly"><br>
	Estados:
	<select name="s_estados">
		@foreach($estados as $value)
				<option class="option" value="{{ $value->id_estado }}">{{$value->nombre_estado}} </option>;
		@endforeach
	</select>
	<br> 	
	Direccion:<input type ="text", maxlength="100", name ="i_direccion"><br>
	Categorias:
	<select name="s_categoria">
		@foreach($categoria as $key)
				<option class="option" value="{{ $key->id_categoria }}">{{$key->nombre_categoria}} </option>;
		@endforeach</select><br>
	Telefono:<input type ="text", maxlength="11", name ="i_telefono", ><br>
	Telefono 2:<input type ="text", maxlength="11", name ="i_telefono2"><br>
	Telefono 3:<input type ="text", maxlength="11", name ="i_telefono3"><br>
	Telefono movil:<input type ="text", maxlength="11", name ="i_celular"><br>
	<input type="submit" value="Agregar">
</form>
</center>