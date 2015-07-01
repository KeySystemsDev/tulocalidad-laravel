<h1>Estado ---> {{ $id_estado }} </h1>

<ul>
	<li><a href="{{ url ('servicios/categoria/'.$id_estado.'/herreria')}}">herreria</a></li>
	<li><a href="{{ url ('servicios/categoria/'.$id_estado.'/gruas')}}">gruas</a></li>
	<li><a href="{{ url ('servicios/categoria/'.$id_estado.'/bancos')}}">bancos</a></li>
	<li><a href="{{ url ('servicios/categoria/'.$id_estado.'/farmacias')}}">farmacias</a></li>
</ul>