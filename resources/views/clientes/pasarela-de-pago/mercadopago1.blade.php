@extends('base-admin')

@section('controller')
	 <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script> 
	<!--<script src="{{ asset('/js/controllers/mercadopago/mercadopago.js') }}"></script>-->
	<script src="{{ asset('/js/controllers/mercadopago.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="MercadopagoContoller">
	
	@include('layouts/navbar-admin')

    
	
</div>
@endsection
