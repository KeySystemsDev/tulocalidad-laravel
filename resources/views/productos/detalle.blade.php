@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <h1 class="page-header"><i class="fa fa-shopping-cart"></i> Detalle del Producto </h1>

        @include('alerts.mensaje_success')
		@include('alerts.mensaje_error')
        
        <div class="row">

            <div class="col-md-4 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Producto </h4>
                    </div>

                    <div class="panel-body">

						<div class="center">
	 						<h1><i class="fa fa-shopping-cart"></i> {{ $producto->nombre_producto }}</h1>		
	 						<h3>{{ $producto->descripcion_producto}}</h3>
	 						<br><br>
	 						<h4>Precio: {{ $producto->precio_producto }} BsF</h4> 
	 					</div>
	 					
	 					<br>

					</div><!-- boby -->
                </div>
            </div>

            <div class="col-md-8 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Images </h4>
                    </div>

                    <div class="panel-body">
						@foreach($imagenes as $imagen)
						<div class="col-md-4">
							<div class="well well-color">
								<img class="img-detalle-producto" src="{{url('/uploads/productos/mid/'.$imagen->nombre_imagen_producto)}}" alt="">
							</div>
						</div>
						@endforeach
					</div><!-- boby -->
                </div>
            </div>
     
        </div><!-- row -->

    </div><!-- content -->
	
</div>
@endsection
