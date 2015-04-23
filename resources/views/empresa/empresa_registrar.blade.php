@extends('app')

@section('content')
<div ng-controller="EmpresaController">
	
	<h1>Formulario de Registro de Empresa</h1>
	<p>Registra tu empresa para el directorio</p>
	<form action ='empresa-procesado', method ='post', name ='formulario'>
		Nombre:<input type ="text", maxlength="20", name ="i_nombre", value ="" ><br>
		Rif:<input type ="text", maxlength="10", name ="i_rif", value ="" >
		<br>	
		Estados:
		<select name="i_estados">
			@foreach($estados as $value)
				<option class="option" value={{ $value->id_estado }}> {{$value->nombre_estado}} </option>; 
			@endforeach
		</select>
		<br> 	
		Direccion:<input type ="text", maxlength="100", name ="i_direccion", value ="" ><br> 
		Categorias:<select name="i_categoria">@foreach($categoria as $value)<option class="option" value={{$value->id_categoria}}>{{$value->nombre_categoria}}</option>; @endforeach</select><br>	
		Telefono:<input type ="text", maxlength="11", name ="i_telefono", value ="" ><br>
		Telefono 2:<input type ="text", maxlength="11", name ="i_telefono2", value ="" ><br>
		Telefono 3:<input type ="text", maxlength="11", name ="i_telefono3", value ="" ><br>
		Telefono movil:<input type ="text", maxlength="11", name ="i_celular", value ="" ><br>
		<input type="submit" value="Registrar">
	</form>

	<div id="map_canvas">
	    <ui-gmap-google-map 
	    	center="map.center" 
	    	zoom="map.zoom" 
	    	draggable="true" 
	    	options="options">
	        	<ui-gmap-marker 
	        		coords="marker.coords" 
	        		options="marker.options"
	        		events="marker.events" 
	        		idkey="marker.id">
	        	</ui-gmap-marker>
	    </ui-gmap-google-map>
    </div>
</div>
@endsection
