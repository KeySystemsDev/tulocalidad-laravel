@extends('base-cliente')

@section('controller')
	<script src="{{ asset('/js/controllers/cliente_servicio.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="ClienteServicioDetalle">
	
	@include('layouts/navbar-cliente')
		
	<br><br>

	@include('layouts/publicidad-larga')

	<div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}">Incio <i class="fa fa-angle-right"></i></a></li>
                            <li><a href="javascript:;">Lista de Servicios</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div ng-init="url='{{url()}}/'"></div>
	<section ng-init="array={{ $servicios}}">

		<div class="container">
			<div class="row">
				
				@include('layouts/categorias-cliente')

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Lista de Servicios</h2>
						
						<div class="col-sm-4" ng-repeat="item in array.data">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										@if(Auth::user())
										<a href="javascript:;" ng-click="agregar_favorito('servicios', item.id_servicio)" class="button-favorito" ng-class="{'button-favorito-red': [[item.favorito]]}"><i class="fa fa-heart"></i></a>
										@endif
										<a ng-href="[[ url + 'detalle-servicio/' + item.id_servicio]]">
											<img ng-src="[[url + 'uploads/servicios/high/' + item.url_imagen_servicio]]" alt="">
										</a>
										<h2>[[item.precio_servicio]] BsF</h2>
										<p class="text-ellipsis">[[item.nombre_servicio]]</p>
										
									</div>
								</div>
							</div>
						</div>
						
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>

	<center>
		<ul class="pagination" ng-if="array.total">
			<li ng-if="array.current_page-2 >= 1">
				<a href="[[array.prev_page_url]]"><</a>
			</li>

			<li ng-if="array.prev_page_url">
				<a href="[[array.prev_page_url]]">[[array.current_page-1]]</a>
			</li>

			<li class="active">
				<a href="">[[array.current_page]]</a>
			</li>

			<li ng-if="array.next_page_url">
				<a href="[[array.next_page_url]]">[[array.current_page+1]]</a>
			</li>

			<li ng-if="array.current_page+2 <= array.last_page ">
				<a href="[[array.next_page_url]]">></a>
			</li>
		</ul>
	</center>


	@include('layouts/footer-cliente')

</div>
@endsection