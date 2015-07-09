@extends('base')

@section('content')
    
    @include('layouts/nav-top')

    @include('layouts/nav')

    <div class="container">
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
                                        <p>
                                            Empresas con Publicidad
                                        </p>
                                    </header>
                                </section>
                            </div>
                        </header>
                        @if(count($publicidad)>0)
                            <section class="panel">
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
                                                            <span class="timeline-icon red"></span>
                                                            <span class="timeline-date">12 July | Sunday</span>
                                                            <div class="row">
                                                                <div class="col-sm-5">
                                                                    <a href="#"><img src="{{url($key->url_imagen_publicidad)}}" class="img-responsive"></a>
                                                                </div>
                                                                <div class="col-sm-7">
                                                                    <h4 class="title-real-estates">
                                                                        <strong><a href="#"><i class="fa fa-coffee"></i> {{$key->nombre_empresa}}</a></strong> <span class="pull-right"><span class="label label-info label-mini">{{$key->rif_empresa}}</span></span>
                                                                    </h4>
                                                                    <br>
                                                                    <p>{{$key->titulo_publicidad}}.</p>
                                                                    <br>
                                                                    <p>
                                                                        <a href=""><button class="btn btn-danger btn-xs" data-original-title="" title=""><i class="fa fa-trash" data-original-title="" title=""></i> Eliminar</button></a>
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
                            </div>
                        </section>
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
                            <a href="../mis-publicidades/agregar-publicidad"><button type="button" class="btn btn-info btn-drop fa fa-plus-square-o" data-original-title="" title=""> Agregar Publicidad</button></a>
                        </header>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection