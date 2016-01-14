@extends('base-cliente')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ClienteProducto">
	
	@include('layouts/navbar-cliente')


	{{$compras}}

</div>

