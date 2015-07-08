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
                        <!--<table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-coffee" data-original-title="" title=""></i> Nombre Empresa</th>
                                    <th><i class="fa fa fa-flag" data-original-title="" title=""></i> Rif</th>                                
                                    <th><i class="fa fa-bullhorn" data-original-title="" title=""></i> Campaña</th>
                                    <th><i class="fa fa-trash" data-original-title="" title=""></i> Deshabilitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publicidad as $key)
                                <tr>
                                    <td>{{$key->nombre_empresa}}</td>
                                    <td><span class="label label-info label-mini">{{$key->rif_empresa}}</span></td>
                                    <td>{{$key->titulo_publicidad}}</td>                                     
                                    <td><a href=""><button class="btn btn-danger btn-xs" data-original-title="" title=""><i class="fa fa-trash" data-original-title="" title=""></i></button></a></td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>-->
                        <section class="panel">
                                <div class="panel-body">
                                    <div class="timeline">
                                        @foreach($publicidad as $key)
                                        <article class="timeline-item">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <span class="arrow"></span>
                                                        <span class="timeline-icon red"></span>
                                                        <span class="timeline-date">12 July | Sunday</span>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <a href="#"><img src="img/content/thumbnail2.jpg" class="img-responsive"></a>
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
                                        <!--<article class="timeline-item alt">
                                            <div class="timeline-desk">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <span class="arrow-alt"></span>
                                                        <span class="timeline-icon green"></span>
                                                        <span class="timeline-date">10:00 am</span>
                                                        <h1 class="green">10 July | Wednesday</h1>
                                                        <p><a href="#">Jonathan Smith</a> added new milestone <span><a href="#" class="green">ERP</a></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>-->
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