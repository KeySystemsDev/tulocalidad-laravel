@extends('base')

@section('content')
	
	@include('layouts/nav-top')

	@include('layouts/nav')
	
<div class="container">
    <div id="main">
        
        <ol class="breadcrumb">
            <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicios</a></li>
            <li><a href="{{ url ('/servicios/estado/'.$id_estado) }}"><i class="fa fa-location-arrow"></i> {{ $id_estado }}</a></li>
            <li class="active"><i class="fa fa-rocket"></i> {{ $id_categoria }} </li>
        </ol>
        <!--<h3>{{$empresas->first()}}</h3>-->

        <!-- start:store list -->
        <div class="row" id="store-list">
            @foreach($empresas as $empresa)
            <div class="col-lg-3">
                <div class="panel">
                    <div class="panel-body">
                        <a href="{{ url ('servicios/empresa/'.$empresa->id_empresa)}}"><img src="{{ url($empresa->icon_empresa) }}" class="img-responsive"></a>
                        <div class="title-realestates-columns">
                            <h5><a href="#"><strong>{{ ucfirst(substr($empresa->nombre_empresa, 0,28)) }}..</strong></a></h5>
                            <small class="label label-warning">Rif: {{$empresa->rif_empresa}}</small>
                            <hr>
                            <p>{{$empresa->descripcion_empresa}}</p>
                        </div>
                        <div class="footer-realestates-columns">
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ url ('servicios/empresa/'.$empresa->id_empresa)}}" class="btn btn-primary btn-block" data-original-title="" title="">Ver Empresa</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- start:pagination -->
            <!--<div class="col-lg-12">
                <ul class="pagination pagination-warning pagination-separated">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">..</a></li>
                    <li><a href="#">32</a></li>
                    <li><a href="#">33</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>-->
            <!-- end:pagination -->
        </div>
        <!-- end:store list -->

    </div>
</div>

@include('layouts/footer')

@endsection