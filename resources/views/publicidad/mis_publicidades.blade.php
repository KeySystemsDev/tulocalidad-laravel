@extends('base')


@section('js')
<script src="{{ asset('/js/controllers/publicidad/publicidad.js') }}"></script>
@endsection

@section('content')
    
    @include('layouts/nav-top')

    @include('layouts/nav')

    <div class="container" ng-controller="MisPublicidadesController">
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
                                            Publicidad
                                        </h2>
                                    </header>
                                </section>
                            </div>
                        </header>
                        @if(count($publicidad)>0)                            
                            <div class="panel-body">
                                <div class="timeline">

                                    @foreach($publicidad as $index=>$key)
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
                                                        <span class="timeline-date"><span class="label label-vinotinto-claro label-mini">{{$key->rif_empresa}}</span></span>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <a href="#"><img src="{{url('/uploads/publicidades_mid/'.$key->url_imagen_publicidad)}}" class="img-responsive"></a>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <h4 class="title-real-estates">
                                                                    <strong><a href="#"><i class="fa fa-bullhorn"></i> {{$key->nombre_empresa}}</a></strong> <span class="pull-right"></span>
                                                                </h4>
                                                                <br>
                                                                <p>{{$key->titulo_publicidad}}.</p>
                                                                <br>
                                                                <p>
                                                                    <button class="btn btn-danger btn-sm button-eliminar-publicidad" ng-click="deshabilitar({{$key->id_publicidad}})"><i class="fa fa-trash" data-original-title="" title=""></i> Eliminar</button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            <div class="clearfix">&nbsp;</div>                            
                        @else
                            <div class="row">
                                <div class="col-lg-6 col-md-6 msn-no-empresa">
                                    <div class="well well-danger well-borde">
                                        {{$mensaje}} 
                                    </div>
                                </div>
                            </div>
                        @endif

                    </section>
                </div>

                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading center">
                            <a href="../mis-publicidades/agregar-publicidad"><button type="button" class="btn btn-agregar-nuevo btn-drop fa fa-plus-square-o" data-original-title="" title=""> Agregar publicidad</button></a>
                        </header>
                    </section>
                </div>
            </div>
        </div>
        @include('modals/confirmacion')
    </div>

    @include('layouts/footer')

@endsection