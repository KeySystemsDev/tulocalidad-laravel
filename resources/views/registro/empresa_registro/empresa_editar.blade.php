
<h1>Formulario de Registro de Empresa</h1>
<p>Registra tu empresa para el directorio</p>
<form action ='empresa-procesado', method ='post', name ='formulario'>
	Nombre:<input type ="text", maxlength="20", name ="nombre", value ="" ><br>
	Rif:<input type ="text", maxlength="10", name ="rif", value ="" ><br>
	Direccion:<input type ="text", maxlength="100", name ="direccion", value ="" ><br>
	Categorias:<select name="categoria"> <option>industria</option> <option>telecomunicaciones</option> <option selected
	>comercio</option> <option>servicios</option></select><br>
	Estados:<select name="estados"> <option>Aragua</option> <option>Caracas</option> <option selected
	>Miranda</option> <option>Vargas</option>
	</select><br>
	Telefono:<input type ="text", maxlength="11", name ="telefono", value ="" ><br>
	Telefono 2:<input type ="text", maxlength="11", name ="telefono2", value ="" ><br>
	Telefono 3:<input type ="text", maxlength="11", name ="telefono3", value ="" ><br>
	Telefono movil:<input type ="text", maxlength="11", name ="celular", value ="" ><br>
	<input type="submit" value="Registrar">
</form>
