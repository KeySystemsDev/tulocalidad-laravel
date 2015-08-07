@extends('base')

@section('js')
    <script src="{{ asset('/js/controllers/empresa/servicios_recomendados.js') }}"></script>
@endsection

@section('content')
	
	@include('layouts/nav-top')

	@include('layouts/nav')
	
<div class="container">
    <div id="main">
        <div class="row">
             <div class="col-lg-12">
                    <section class="panel">                         
                        <div class="panel-body">
                        <!--
                            INICIALIZACION DE VARIABLE DE REDIREECION DE PAGINACION
                        -->
                        <div ng-init="paginacion-href='/servicios/categoria/{{ strtolower($id_estado) }}/{{ strtolower($id_categoria) }}/'"></div>
                        <ol class="breadcrumb">
                            <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicios</a></li>
                            <li><a href="{{ url ('/servicios/estado/'.strtolower($id_estado)) }}"><i class="fa fa-globe"></i> {{ ucfirst($id_estado) }}</a></li>
                            <li class="active"><i class="fa fa-location-arrow"></i> {{ ucfirst($id_categoria) }} </li>
                        </ol>

                        <!-- start:store list -->

                        <div class="row" id="store-list">
                            @foreach($data->consulta as $empresa)
                            <div class="col-lg-6">  
                                <div class="panel panel-custon">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <a href="{{ url ('servicios/empresa/'.$empresa->id_empresa)}}"><img src="{{ url('/uploads/empresas_high/'.$empresa->icon_empresa) }}" class="img-responsive img-5"></a>
                                                <!--<a class="btn btn-danger" data-original-title="" title="">{{$empresa->rif_empresa}}</a>-->
                                            </div>
                                            <div class="col-sm-7">
                                                <a href="{{ url ('servicios/empresa/'.$empresa->id_empresa)}}" class="btn btn-default btn-drop" data-original-title="" title="">
                                                    {{ ucfirst(substr($empresa->nombre_empresa, 0,28)) }} 
                                                    <i class="fa fa-chevron-right" data-original-title="" title=""></i> 
                                                </a>
                                                <hr>                                                                    
                                                <p>{{ ucfirst($empresa->descripcion_empresa) }}</p>
                                            </div>
                <!--
                                            <p>
                                                <a href="{{ url ('servicios/empresa/'.$empresa->id_empresa)}}" class="btn btn-primary btn-sm button-ver-detalle" data-original-title="" title="" style="bottom:0px;">Ver Empresa <i class="fa fa-chevron-right"></i></a>
                                            </p>
                -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- PAGINADOR 
                                
                                $data->current_page   = es la pagina actual.
                                $data->pages          = es el numero de paginas que tiene la paginacion

                            -->
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
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts/footer')

@endsection