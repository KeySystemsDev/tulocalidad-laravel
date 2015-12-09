@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">        

        <h1 class="page-header"><i class="fa fa-coffee"></i> Detalle de Servico </h1>

        @include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
        
        <div class="row">

            <div class="col-md-5 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Servicio </h4>
                    </div>

                    <div class="panel-body">

	                    <div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-10">
								<div class="well well-color">
									<img class="img-detalle-empresa" src="{{ url ('/uploads/servicios/high/'.$servicio->url_imagen_servicio) }}"></img>
								</div>
							</div>
						</div>

						<div class="center">
		 					<h3><i class="fa fa-coffee"></i> {{ $servicio->nombre_servicio }}</h3>
		 					<br>
		 					<h5> {{ $servicio->descripcion_servicio}}</h5>
		 					<h4> {{ $servicio->precio_servicio }}</h4>
		 				</div>
			
					</div><!-- boby -->
                </div>
            </div>
        
        </div><!-- row -->

    </div><!-- content -->
	
</div>
@endsection
