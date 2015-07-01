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
                              @if(count($publicidad)>0)
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
    
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fa fa-coffee" data-original-title="" title=""></i> Nombre Empresa</th>
                                    <th><i class="fa fa fa-flag" data-original-title="" title=""></i> Rif</th>                                
                                    <th><i class="fa fa-bullhorn" data-original-title="" title=""></i> Campaña</th>
                                    <th><i class="fa fa-pencil" data-original-title="" title=""></i> Editar</th>
                                    <th><i class="fa fa-trash" data-original-title="" title=""></i> Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($publicidad as $key)
                                <tr>
                                    <td>{{$key->nombre_empresa}}</td>
                                    <td><span class="label label-info label-mini">{{$key->rif_empresa}}</span></td>
                                    <td>{{$key->titulo_publicidad}}</td>
                                    <td><a href="../mis-publicidades/editar-publicidad/1"><button class="btn btn-primary btn-xs" data-original-title="" title=""><i class="fa fa-pencil" data-original-title="" title=""></i></button></a></td>                                       
                                    <td><a href=""><button class="btn btn-danger btn-xs" data-original-title="" title=""><i class="fa fa-trash" data-original-title="" title=""></i></button></a></td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                         @else 
                            <div> No tiene empresa registrada. </div>
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