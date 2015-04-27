@extends('app')

@section('content')
<div ng-controller="EmpresaRegistroController">
	
	<div class="container">

		<h1>Formulario de Registro de Empresa</h1>
		<p>Registra tu empresa para el directorio</p>
		<hr>

		<form role="form" name="formulario" id="formulario" action="empresa-procesado" method ="post">
			
			<div class="form-group" ng-class="{'has-error': formulario.i_nombre.$invalid, 'has-success': formulario.i_nombre.$valid}">
      			<label for="inputNombre">Nombre de la Empresa</label>
      		<input id="inputNombre" type="text" maxlength="20" class="form-control" placeholder="Nombre de la Empresa" name="i_nombre" ng-model="formData.i_nombre" required>
    		</div>
			
			Rif:<input type="text" maxlength="10" minlength="10" name="i_rif">
			<br>	
			Estados:

			<select  ng-change="estado_ruta(estado)" ng-model="estado">
			  <option ng-repeat="estado in estados" 
			  		  value="[[estado.id_estado]] + [[estado.latitud_estado]] + [[estado.longitud_estado]]"
			  		  ng-if="[[estado.id_estado]] == 10" 
			  		  selected>
			    [[ estado.nombre_estado]]
			  </option>
			  <option ng-repeat="estado in estados" 
			  		  value="[[estado.id_estado]] + [[estado.latitud_estado]] + [[estado.longitud_estado]]"
			  		  ng-else="[[estado.id_estado]] != 10">
			    [[ estado.nombre_estado]]
			  </option>
			</select>
			<br>

			latitude: <input type ="text" id="i_latitud" name="i_latitud" readonly="false"><br>	
			longitude: <input type ="text" id="i_longitud" name="i_longitud" readonly="false">	<br> 	
			Direccion:<input type ="text" maxlength="100" name ="i_direccion"><br> 
			Categorias:<select name="i_categoria">
			@foreach($categoria as $value)
				<option class="option" value="{{$value->id_categoria}}">{{$value->nombre_categoria}}</option>; 
			@endforeach</select><br>	
			Telefono:<input type="tel" maxlength="11" minlength="11" name="i_telefono"><br>
			Telefono 2:<input type="tel" maxlength="11" minlength="11" name="i_telefono2"><br>
			Telefono 3:<input type="tel" maxlength="11" minlength="11" name="i_telefono3"><br>
			Telefono movil:<input type="tel" maxlength="11" minlength="11" name="i_celular"><br>
			
			Correo Electrónico:<input type ="email" ng-class="{'error':formulario.i_correo.$invalid && formulario.i_correo.$touched}"name ="i_correo" ng-model="formData.i_correo" required><br>
			
			
			Sitio Web:<input type="url" ng-class="{'error':formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched}" name="i_sitio_web" id="i_sitio_web" ng-model="formData.i_sitio_web" required><br>
			
			<span ng-if="formulario.i_correo.$invalid && formulario.i_correo.$touched"> Verifique el formato del correo: Ejemplo: ejample@dominio.com</span>
			<span ng-if="formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched"> Verifique la direccion: Ejemplo: http://test.com </span>
			
			<div ng-show="formulario.i_correo.$dirty && formulario.i_correo.$invalid">
        		<p class="help-block text-danger" ng-show="forma.i_correo.$error.required">Campo obligatorio</p>
        		<p class="help-block text-danger" ng-show="formulario.i_correo.$error.email">Email invalido</p>
      		</div>

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

	    	<input type="submit" value="Registrar">
	    	<button class="btn btn-success" type="submit" value="Registrar" ng-disabled="formulario.$invalid">Registrar</button>
		</form>
	</div>
</div>
@endsection
