<center><h1>Actualizar Registro de Empresa</h1>
<p>Manten tus datos al dia</p>
<form action ='actionEditar', method ='post', name ='formulario'>
	<input type="hidden" id="id_empresa" name="id_empresa" value = "{{$t_empresa->id_empresa}}">
	Nombre:<input type ="text", maxlength="20", name ="i_nombre", value ="{{$t_empresa->nombre_empresa}}" readonly="readonly" ><br>
	Rif:<input type ="text", maxlength="10", name ="i_rif", value ="{{$t_empresa->rif_empresa}}"  readonly="readonly"><br>
	Direccion:<input type ="text", maxlength="100", name ="i_direccion", value ="{{$t_empresa->direccion_empresa}}" ><br>
	Categorias:<select name="categoria"> <option>industria</option> <option>telecomunicaciones</option> <option selected
	>comercio</option> <option>servicios</option></select><br>
	Estados:<select name="estados"> <option>Aragua</option> <option>Caracas</option> <option selected
	>Miranda</option> <option>Vargas</option>
	</select><br>
	Telefono:<input type ="text", maxlength="11", name ="i_telefono", value ="{{$t_empresa->telefono_empresa}}" ><br>
	Telefono 2:<input type ="text", maxlength="11", name ="i_telefono2", value ="{{$t_empresa->telefono_2_empresa}}" ><br>
	Telefono 3:<input type ="text", maxlength="11", name ="i_telefono3", value ="{{$t_empresa->telefono_3_empresa}}" ><br>
	Telefono movil:<input type ="text", maxlength="11", name ="i_celular", value ="{{$t_empresa->telefono_movil_empresa}}" ><br>
	<input type="submit" value="Actualizar Registro">
</form>
</center>