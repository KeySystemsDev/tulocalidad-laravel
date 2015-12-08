@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('/empresas/'.$id_empresa.'/productos/create') }}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Agregar Productos">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
        </ol>
        

        <h1 class="page-header"><i class="fa fa-laptop"></i> Lista de Productos </h1>
        
		@include('alerts.mensaje_success')
		@include('alerts.mensaje_error')

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
                        <h4 class="panel-title">Productos</h4>
                    </div>

                    <div class="panel-body">

						<table class="table table-hover">
						    <thead>
						      <tr>
								<th> nombre</th>
								<th> precio</th>
						        <th> Operaciones</th>
						      </tr>
						    </thead>
						    <tbody>
						    	@foreach($productos as $producto)
							    	<tr>
										<td>{{$producto->nombre_producto}}</td>
										<td>{{$producto->precio_producto}}</td>
							        	<td >
							        		<a class="btn btn-sm btn-info" href="{{ url( '/empresas/'.$producto->id_empresa.'/productos/'.$producto->id_producto ) }}"  data-toggle="tooltip" data-title="Detalle"><i class="fa fa-bars"></i></a>
							        		<a class="btn btn-sm btn-success" href="{{ url( '/empresas/'.$producto->id_empresa.'/productos/'.$producto->id_producto.'/edit' ) }}"  data-toggle="tooltip" data-title="Editar"><i class="fa fa-pencil-square-o"></i></a>	        		
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
