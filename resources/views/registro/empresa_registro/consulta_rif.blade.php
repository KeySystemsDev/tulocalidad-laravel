@extends('app')

@section('content')
<div ng-controller="EmpresaController">

	<h1>Formulario de Consulta de Rif</h1>
	<p>Ingresa el rif a consultar:</p>
	<form action ='registro/empresa', method ='post', name ='formulario'>
		Rif:<input type ="text", maxlength="20", name ="i_rif", value ="" placeholder="J-12345678-9"><br>		
		<input type="submit" value="Buscar">
	</form>

</div>
@endsection
	