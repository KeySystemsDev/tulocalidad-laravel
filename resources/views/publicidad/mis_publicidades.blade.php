@extends('base-admin')

@section('js')
    <script src="{{ asset('/js/controllers/publicidad/publicidad.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="MisPublicidadesController">
    
    @include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
    
    <div id="content" class="content ng-scope">
        
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('mis-publicidades/agregar-publicidad')}}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('mis-publicidades/listar')}}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </div>
            </div>
        </ol>

        <h1 class="page-header"><i class="fa fa-bullhorn"></i> Mis Pueblicidades </h1>
        
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
                        <h4 class="panel-title">Todas las Publicidad</h4>
                    </div>

                    <div class="panel-body">

                        <div class="well well-listar-2">
                            @if(count($data->consulta)>0)  

                            <div class="row">
                                @foreach($data->consulta as $index=>$key)
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <div class="thumbnail" href="#">
                                        <img class="img-responsive img-responsive-custon" src="{{url('/uploads/publicidades_mid/'.$key->url_imagen_publicidad)}}" alt="">
                                        <div class="info-publicidad">
                                            <h6>{{$key->nombre_empresa}}</h6>
                                            <p>{{$key->titulo_publicidad}}</p>
                                        </div>
                                        <div class="row row-2">
                                            <div class="btn-group-sm boton-barrar">
                                                <button type="button" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Borrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            
                            </div>

                            @else
                                <div id="gritter-notice-wrapper" ng-hide="ocultar">
                                    <div id="gritter-item-1" class="gritter-item-wrapper my-sticky-class" role="alert">
                                        <div class="gritter-top"></div>
                                        <div class="gritter-item">
                                            <a class="gritter-close" tabindex="1" style="display: none;" ng-click="cerrar()">Close Notification</a>
                                            <img src="{{ asset('/img/tulocalidad-blanco.png') }}" class="gritter-image">
                                            <div class="gritter-with-image">
                                                <span class="gritter-title">Estimado Usuario</span>
                                                <p>En estos momentos no posee niguna publicidad registra.</p>
                                            </div>
                                            <div style="clear:both"></div>
                                        </div>
                                        <div class="gritter-bottom"></div>
                                    </div>
                                </div>
                            @endif
                            
                        </div>
                        
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

    </div><!-- content -->
    
    @include('modals/confirmacion')

</div>


@endsection
