@extends('base')

@section('js')
    <script src="{{ asset('/js/controllers/empresa/servicios_recomendados.js') }}"></script>
@endsection

@section('content')
	
	@include('layouts/nav-top')

	@include('layouts/nav')
	
<div class="container">
    <div id="main">
        <!--
            INICIALIZACION DE VARIABLE DE REDIREECION DE PAGINACION
        -->
        <div ng-init="paginacion-href='/servicios/categoria/{{ $id_estado }}/{{ $id_categoria }}/'"></div>
        <ol class="breadcrumb">
            <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicios</a></li>
            <li><a href="{{ url ('/servicios/estado/'.$id_estado) }}"><i class="fa fa-location-arrow"></i> {{ $id_estado }}</a></li>
            <li class="active"><i class="fa fa-rocket"></i> {{ $id_categoria }} </li>
        </ol>
        <!--<h3>{{$empresas->first()}}</h3>-->

        <!-- start:store list -->
        {{print_r($data->type)}}
        {{print("______________________________________________________________________________")}}
        {{print_r($empresas->type)}}

        <div class="row" id="store-list">
            @foreach($empresas as $empresa)
            <div class="col-lg-6">  
                <div class="panel">
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


        <div class="row" id="store-list">
            @foreach($empresas as $empresa)
            <div class="col-lg-6">  
                <div class="panel">
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

        </div>
        <!-- end:store list -->

    </div>
</div>

@include('layouts/footer')

@endsection