@extends('base')

@section('content')
	
	@include('layouts/nav-top-cliente')

	@include('layouts/nav-cliente')

<h1>Detalle de la empresa -  {{ $id_empresa }}</h1>

@endsection