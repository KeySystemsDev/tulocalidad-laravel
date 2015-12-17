@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
            </div>
        </ol>
        

        <h1 class="page-header"><i class="fa fa-laptop"></i> Lista de todos los productos </h1>
        
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-12 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Carrito de compras</h4>
                    </div>

                    <div class="panel-body">
		
						@include('alerts.mensaje_success')
						@include('alerts.mensaje_error')
								
						<table class="table table-hover">
						    <tbody>
								@foreach($productos as $producto)
							    	<tr>
										<td class ='row'>
											<div class='col-md-2'> 
												<img src="{{ url('/uploads/productos/low/'.$producto['data_producto']['primera_imagen']['nombre_imagen_producto']) }}" alt=""></div>
											<div class='col-md-2 col-xs-offset-1'>{{$producto['data_producto']['nombre_producto']}}</div>
											<div class='col-md-4 '>{{$producto['data_producto']['descripcion_producto']}}</div>
											<div class='col-md-1 '>{{$producto['data_producto']['precio_producto']}}</div>
										</td>
							        	<td >
							        		<a class="btn btn-sm btn-info" href="{{ url( '/eliminar-carrito/'.$producto['id_producto']) }}" data-toggle="tooltip" data-title="quitar del carrito"> borrar<i class="fa fa-"></i></a>
							        	</td>
							        </tr>
								@endforeach


						    </tbody>
						</table>

					</div><!-- boby -->


                </div>

	            <div class="btn-toolbar">
	                <div class="btn-group">
	                    <a href="{{ url( '/comprar/metodo-pago' ) }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="comprar">
	                       comprar <i class="fa fa-plus"></i>
	                    </a>
	                </div>
	            </div>     

            </div>
        </div>

    </div><!-- content -->
	
</div>
@endsection
