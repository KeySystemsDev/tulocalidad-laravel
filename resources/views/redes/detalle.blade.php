@extends('base-admin')

@section('content')
<div class="container">
			@include('layouts/navbar-admin')

		<br>
		<br>
		<br>
		<br>
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
	
	 nombre: {{ $red->nombre_red_social }}  <br><br>
	 url: {{ $red->url_red_social}}  <br><br>
	 
	


	
</div>
@endsection