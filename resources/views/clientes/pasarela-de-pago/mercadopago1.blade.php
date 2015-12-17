@extends('base-admin')

@section('controller')
	 <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script> 
	<!--<script src="{{ asset('/js/controllers/mercadopago/mercadopago.js') }}"></script>-->
	<script src="{{ asset('/js/controllers/mercadopago.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="MercadopagoContoller">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
		        
		<form action="" method="post" id="pay" name="pay" > 
		    <fieldset>
		        <ul>
		        	<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		            <li>
		                <label for="email">Email</label>
		                <input id="email" name="email" value="test_user_19653727@testuser.com" type="email" placeholder="your email"/>
		            </li>
		            <li>
		                <label for="cardNumber">Credit card number:</label>
		                <input type="text" id="cardNumber" data-checkout="cardNumber" placeholder="4509 9535 6623 3704" />
		            </li>
		            <li>
		                <label for="securityCode">Security code:</label>
		                <input type="text" id="securityCode" data-checkout="securityCode" placeholder="123" />
		            </li>
		            <li>
		                <label for="cardExpirationMonth">Expiration month:</label>
		                <input type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="12" />
		            </li>
		            <li>
		                <label for="cardExpirationYear">Expiration year:</label>
		                <input type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="2015" />
		            </li>
		            <li>
		                <label for="cardholderName">Card holder name:</label>
		                <input type="text" id="cardholderName" data-checkout="cardholderName" placeholder="APRO" />
		            </li>
		            <li>
		                <label for="docType">Document type:</label>
		                <select id="docType" data-checkout="docType"></select>
		            </li>
		            <li>
		                <label for="docNumber">Document number:</label>
		                <input type="text" id="docNumber" data-checkout="docNumber" placeholder="12345678" />
		            </li>
		        </ul>
		        <input type="button" value="Pay!" ng-click="submit(pay)"/>
		    </fieldset>
		</form>

    </div><!-- content -->
	
</div>
@endsection
