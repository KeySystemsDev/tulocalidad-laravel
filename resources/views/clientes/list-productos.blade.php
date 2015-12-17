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
                        <h4 class="panel-title">Empresas</h4>
                    </div>

                    <div class="panel-body">
		
						@include('alerts.mensaje_success')
						@include('alerts.mensaje_error')
								
						<table class="table table-hover">
						    <thead>
						      <tr>
								<th> Nombre</th>
								<th> Precio</th>
						        <th> Agregar a carrito</th>
						      </tr>
						    </thead>
						    <tbody>
						    	@foreach($productos as $producto)
							    	<tr>
										<td class ='row'>
											<div class='col-md-2'> 
												<img src="{{ url('/uploads/productos/low/'.$producto->primera_imagen['nombre_imagen_producto']) }}" alt=""></div>
											<div class='col-md-4 col-xs-offset-2'>{{$producto->nombre_producto}}</div>

										</td>
										<td>{{$producto->precio_producto}}</td>
							        	<td >
							        		<a class="btn btn-sm btn-info" href="{{ url( '/agregar-carrito/'.$producto->id_producto) }}" data-toggle="tooltip" data-title="agregar a carrito"> <i class="fa fa-plus"></i></a>
							        	</td>
							        </tr>
								@endforeach
						    </tbody>
						</table>
	
					</div><!-- boby -->
                </div>
            </div>
        </div>

    </div><!-- content -->
	
</div>
@endsection
