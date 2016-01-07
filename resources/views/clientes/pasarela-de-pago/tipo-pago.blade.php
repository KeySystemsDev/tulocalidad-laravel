@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    
	
	<div id="content" class="content ng-scope">
        
        <a href="{{ url('comprar/mercadopago') }}">MERCADOPAGO</a>

    </div><!-- content -->
	
</div>
@endsection
