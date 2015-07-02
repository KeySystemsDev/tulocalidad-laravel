<h1>Recomendados o Publicidad</h1>

<ul>
	<li><a href="{{ url ('servicios/todo')}}">Estados</a></li>
</ul>

<table border="1">
	<tr>
		<td>Imagen</td>
		<td>Id Publicidad</td>
	</tr>
@foreach ($consulta as $key)
	<tr>
		<td>{{$key->url_imagen_publicidad}}</td>
		<td>{{$key->id_publicidad}}</td>
	</tr>
@endforeach
</table>