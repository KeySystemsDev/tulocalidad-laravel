@extends('base-admin')

@section('js')
    <script src="{{ asset('/js/controllers/empresa/empresa.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="MisEmpresasController">
    
    @include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
    
    <div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('mis-empresas/agregar') }}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('mis-empresas/listar') }}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </div>
            </div>
        </ol>

        <h1 class="page-header"><i class="fa fa-building"></i> Mis Empresas </h1>
        
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
                        
                        <div class="well well-listar">
                            
                            <div class="row">
                                <div class="col-lg-12 center">
                                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">          
                                </div>
                            </div>
                        
                            <ul class="timeline">
                                @if(count($data->consulta)>0)  
                                    @foreach($data->consulta as $index=>$value)
                                        <li>
                                            <!-- begin timeline-time -->
                                            <div class="timeline-time">
                                                <span class="date">today</span>
                                                <span class="time">04:20</span>
                                            </div>
                                            <!-- end timeline-time -->
                                            <!-- begin timeline-icon -->
                                            <div class="timeline-icon">
                                                <a href="javascript:;"><i class="fa fa-building"></i></a>
                                            </div>
                                            <!-- end timeline-icon -->
                                            <!-- begin timeline-body -->
                                            <div class="timeline-body">
                                                <div class="timeline-header">
                                                    <span class="userimage"><img src="{{url('/uploads/empresas_mid/'.$value->icon_empresa)}}" alt=""></span>
                                                    <span class="username"><a href="javascript:;"></a>{{$value->nombre_empresa}}<small></small></span>
                                                    <span class="pull-right text-muted">{{$value->rif_empresa}}</span>
                                                </div>
                                                <div class="timeline-content">
                                                    <p>
                                                        {{$value->descripcion_empresa}}
                                                    </p>
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="{{ url ('/mis-publicidades/agregar-publicidad/'.$value->id_empresa) }}" class="m-r-15"><i class="fa fa-bullhorn fa-fw"></i> Agregar Publicidad</a>
                                                    <a href="/mis-empresas/editar/{{$value->id_empresa}}"><i class="fa fa-pencil fa-fw"></i> Editar</a>
                                                    <button type="button" class="btn btn-danger button-eliminar btn-sm" data-original-title="" title="" ng-click="deshabilitar({{$value->id_empresa}})"><i class="fa fa-trash" data-original-title="" title=""></i></button>
                                                </div>
                                            </div>
                                            <!-- end timeline-body -->
                                        </li>
                                    @endforeach
                                @else
                                    <div id="gritter-notice-wrapper" ng-hide="ocultar">
                                        <div id="gritter-item-1" class="gritter-item-wrapper my-sticky-class" role="alert">
                                            <div class="gritter-top"></div>
                                            <div class="gritter-item">
                                                <a class="gritter-close" tabindex="1" style="display: none;" ng-click="cerrar()">Close Notification</a>
                                                <img src="{{ asset('/img/tulocalidad-blanco.png') }}" class="gritter-image">
                                                <div class="gritter-with-image">
                                                    <span class="gritter-title">Estimado Usuario</span>
                                                    <p>En estos momentos no posee niguna empresa registra.</p>
                                                </div>
                                                <div style="clear:both"></div>
                                            </div>
                                            <div class="gritter-bottom"></div>
                                        </div>
                                    </div>
                                @endif
                                <li>
                                    <!-- begin timeline-icon -->
                                    <div class="timeline-icon">
                                        <a href="javascript:;"><i class="fa fa-spinner"></i></a>
                                    </div>
                                </li>
                            </ul>

                            <center>
                                <div class="col-lg-12">
                                    @if ($data->pages > 1)
                                    <ul  class="pagination pagination-primary pagination-separated">
                                        @if (1 < $data->current_page )
                                            <li>  <a href ="[[paginacionhref]]?page={{$data->current_page-1}}"><</a> </li>
                                        @endif                                        
                                        @for ($active = 0; $active < $data->pages; $active++)
                                            <li><a href ="[[paginacionhref]]?page={{$active+1}}" >{{$active+1}}</a></li>
                                        @endfor
                                        @if ($data->current_page < $data->pages)
                                            <li>  <a href ="[[paginacionhref]]?page={{$data->current_page+1}}">></a> </li>
                                        @endif
                                    </ul>
                                    @endif  
                                </div>
                            </center>  

                        </div>
                    
                    </div>
                </div>
            </div>
        </div>

    </div><!-- content -->

    @include('modals/confirmacion')

</div>


@endsection
