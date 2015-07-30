@extends('base')

@section('js')
<script src="{{ asset('/js/controllers/empresa/empresa.js') }}"></script>
@endsection

@section('content')
    
    @include('layouts/nav-top')

	@include('layouts/nav')

	<div class="container" ng-controller="MisEmpresasController">
		<div id="main">

			<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <div class="col-lg-12">
			                	<section class="panel">
			                		<header class="panel-heading center">
					                    <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
					                    <h2>
					                        Empresas registradas
					                    </h2>
			                    	</header>
			                    </section>
			                </div>
                        </header>
                        @if(count($consulta)>0)                            
                            <article class="panel-body">
                                <div class="timeline">
                                    @foreach($consulta as $index=>$value)
                                        @if($index%2)
                                            <article class="timeline-item">
                                        @else
                                            <article class="timeline-item alt">
                                        @endif
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        @if($index%2)
                                                            <span class="arrow"></span>
                                                        @else
                                                             <span class="arrow-alt"></span>
                                                        @endif
                                                        <span class="timeline-icon vinotinto"></span>
                                                        <span class="timeline-date"><span class="label label-vinotinto-claro label-mini">{{$value->rif_empresa}}</span></span>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <a href="#"><img src="{{url('/uploads/empresas_mid/'.$value->icon_empresa)}}" class="img-responsive"></a>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <h4 class="title-real-estates vinotinto">
                                                                    <strong><a href="#"><i class="fa fa-building"></i> {{$value->nombre_empresa}}</a></strong> <span class="pull-right"></span>
                                                                </h4>
                                                                <br>
                                                                <p>{{$value->descripcion_empresa}}</p>
                                                                <br>
                                                                <p>
                                                                    <a href="{{ url ('/mis-publicidades/agregar-publicidad/'.$value->id_empresa) }}"><button class="btn btn-success btn-sm"><i class="fa fa-bullhorn" data-original-title="" title=""></i> Agregar Publicidad</button></a>
                                                                    <a href="/mis-empresas/editar/{{$value->id_empresa}}"><button class="btn btn-primary btn-sm" data-original-title="" title=""><i class="fa fa-pencil" data-original-title="" title=""></i> Editar</button></a>
                                                                    <button type="button" class="btn btn-danger btn-circle btn-sm" data-original-title="" title="" ng-click="deshabilitar({{$value->id_empresa}})"><i class="fa fa-trash" data-original-title="" title=""></i></button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </article>
                            <div class="clearfix">&nbsp;</div>                            
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 msn-no-empresa">
                                    <div class="well well-danger well-borde">
                                        No tiene empresa registrada. 
                                    </div>
                                </div>
                            </div>                 
                        @endif
                    </section>
                </div>

                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading center">
                            <a href="/mis-empresas/agregar"><button type="button" class="btn btn-agregar-nuevo btn-drop fa fa-plus-square-o" data-original-title="" title=""> Agregar empresa</button></a>
                        </header>
                    </section>
                </div>
            </div>
		</div>

        @include('modals/confirmacion')
	</div>

    @include('layouts/footer')
    
@endsection