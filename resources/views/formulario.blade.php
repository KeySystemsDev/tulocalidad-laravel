<html>
<head>
<title>Formulario</title>
</head>
<body><center>
				<p>Registra tu empresa para el directorio</p>
		<form action ='formulario/recibir', method ='post', name ='formulario'>
		<div>Nombre:<input type ="text", maxlength="20", name ="nombre", value ="" > </div> <br>
		<div>Rif:<input type ="text", maxlength="10", name ="rif", value ="" > </div> <br>
		<div>Direccion:<input type ="text", maxlength="100", name ="direccion", value ="" > </div><br>
		<div>Categorias:<select name="categoria"> <Option>industria</option> <Option>telecomunicaciones</option> <Option selected
		>comercio</option> <Option>servicios</option></select></div><br>
		<div>Estados:<select name="estados"> <Option>Aragua</option> <Option>Caracas</option> <Option selected
		>Miranda</option> <Option>Vargas</option>
		</select></div><br>
		<div>Telefono:<input type ="text", maxlength="11", name ="telefono", value ="" > </div> <br>
		<div>Telefono 2:<input type ="text", maxlength="11", name ="telefono2", value ="" > </div> <br>
		<div>Telefono 3:<input type ="text", maxlength="11", name ="telefono3", value ="" > </div> <br>
		<div>Telefono movil:<input type ="text", maxlength="11", name ="celular", value ="" > </div> <br>
		<input type="hidden" name="grabar" value= "si">
		<input type="submit" value="Registrar">
		</form>

	</center>
</body>

</html
