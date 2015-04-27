<center><h1>Actualizar Registro de Empresa</h1>
<p>Manten tus datos al dia</p>
<form action ='../actualizar', method ='post', name ='formulario'>
	<input type="hidden" id="id_empresa" name="id_empresa" value = "{{$empresa->id_empresa}}">
	Nombre:<input type ="text", maxlength="20", name ="i_nombre", value ="{{$empresa->nombre_empresa}}" readonly="readonly" ><br>
	Rif:<input type ="text", maxlength="10", name ="i_rif", value ="{{$empresa->rif_empresa}}"  readonly="readonly"><br>
	Estados:
	<select name="s_estados">
		@foreach($estados as $value)
			@if ($value->id_estado == $empresa->id_estado)
				<option class="option" value="{{ $value->id_estado }}" selected> {{$value->nombre_estado}} </option>; 
			@else
				<option class="option" value="{{ $value->id_estado }}">{{$value->nombre_estado}} </option>;
			@endif
		@endforeach
	</select>
	<br> 	
	Direccion:<input type ="text", maxlength="100", name ="i_direccion", value ="{{$empresa->direccion_empresa}}" ><br>
	Categorias:
	<select name="s_categoria">
		@foreach($categoria as $key)
			@if ($key->id_categoria == $empresa->id_categoria)
				<option class="option" value="{{ $key->id_categoria }}" selected >{{$key->nombre_categoria}} </option>;
			@else
				<option class="option" value="{{ $key->id_categoria }}">{{$key->nombre_categoria}} </option>;
			@endif

		@endforeach</select><br>
	Telefono:<input type ="text", maxlength="11", name ="i_telefono", value ="{{$empresa->telefono_empresa}}" ><br>
	Telefono 2:<input type ="text", maxlength="11", name ="i_telefono2", value ="{{$empresa->telefono_2_empresa}}" ><br>
	Telefono 3:<input type ="text", maxlength="11", name ="i_telefono3", value ="{{$empresa->telefono_3_empresa}}" ><br>
	Telefono movil:<input type ="text", maxlength="11", name ="i_celular", value ="{{$empresa->telefono_movil_empresa}}" ><br>
	Correo Electrónico:<input type ="email" name ="i_correo" value ="{{$empresa->correo_empresa}}" required><br>
	Sitio Web:<input type="url"name="i_sitio_web" value="{{$empresa->url_empresa}}"><br>

	<input type="submit" value="Actualizar Registro">
</form>
</center>