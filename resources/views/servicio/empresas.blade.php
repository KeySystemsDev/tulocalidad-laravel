<h1>Empresas ---> {{ $id_estado }} + {{ $id_categoria }} </h1>

<ul>
	<li><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/key systems')}}">key systems</a></li>
	<li><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/banesco')}}">banesco</a></li>
	<li><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/adidas')}}">adidas</a></li>
	<li><a href="{{ url ('servicios/empresa/'.$id_estado.'/'.$id_categoria.'/puma')}}">puma</a></li>
</ul>