@extends('base-cliente')

@section('content')

<div id="page-container" class="fade">
    
    @include('layouts/navbar-cliente')
    
    <!-- begin #contact -->
    <div class="content bg-silver-lighter">
        <!-- begin container -->

        <div class="container" ng-controller="DetalleEmpresaController">
            <br><br>
            <div id="main">
                <ol class="breadcrumb">
                    <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicos</a></li>
                    <li><a href="{{ url ('/servicios/estado/'.$estado) }}"><i class="fa fa-globe"></i> {{ $estado }}</a></li>
                    <li><a href="{{ url ('/servicios/categoria/'.$estado.'/'.$categoria) }}"><i class="fa fa-cubes"></i> {{ $categoria }}</a></li>
                    <li class="active"><i class="fa fa-rocket"></i> {{ $empresa->nombre_empresa }} </li>
                </ol>
                <br>
            
                <!-- start:real estates detail -->
                <div class="row" id="real-estates-detail">
                    <div class="col-lg-4 col-md-4 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">                        
                                <b align="center">
                                    {{$empresa->nombre_empresa}}
                                </b>                         
                            </div>
                            <div class="panel-body">
                                <div class="text-center" id="author">
                                    <img width="157" height="157" src="{{ url('/uploads/empresas_mid/'.$empresa->icon_empresa) }}" class="img-5">
                                    <h3></h3>
                                    <small class="label label-info">{{$empresa->rif_empresa}}</small>
                                    <p>{{$empresa->descripcion_empresa}}</p>
                                    <!--<p class="sosmed-author">
                                        <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus"></i></a>
                                    </p>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-xs-12">
                        <div class="panel">
                            <div class="panel-body">
                                <ul id="myTab" class="nav nav-pills">                          
                                    <li class="active"><a href="#detail" data-toggle="tab">Detalle</a></li>
                                    <!--<li class=""><a href="#contact" data-toggle="tab">Contacto</a></li>-->
                                    <!--<li class=""><a href="#photos" data-toggle="tab">Ubicación</a></li>-->
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    
                                    <div class="tab-pane fade" id="photos">  
                                        
                                    </div>
                                    
                                    <div class="tab-pane fade active in" id="detail">
                                        <p></p>
                                        <table class="table table-hover personal-task">
                                        <tbody>
                                            <tr>
                                                <td width="7%">
                                                    <i class=" fa fa fa-map-marker" data-original-title="" title=""></i>
                                                </td>
                                                <td>{{$empresa->direccion_empresa}}</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-cubes" data-original-title="" title=""></i>
                                                </td>
                                                <td>{{$categoria}}</td>
                                                <td></td>
                                            </tr>
                                            <tr ng-if="'{{$empresa->telefono_empresa}}' != '' " ng-cloak>
                                                <td>
                                                    <i class="fa fa-phone" data-original-title="" title=""></i>
                                                </td>
                                                <td>{{$empresa->telefono_empresa}}</td>
                                                <td></td>
                                            </tr>
                                            <tr ng-if="'{{$empresa->telefono_2_empresa}}' != '' " ng-cloak>
                                                <td>
                                                    <i class="fa fa-phone" data-original-title="" title=""></i>
                                                </td>
                                                <td>{{$empresa->telefono_2_empresa}}</td>
                                                <td></td>
                                            </tr>
                                            <tr ng-if="'{{$empresa->telefono_movil_empresa}}' != '' " ng-cloak>
                                                <td>
                                                    <i class="fa fa-phone" data-original-title="" title=""></i>
                                                </td>
                                                <td>{{$empresa->telefono_movil_empresa}}</td>
                                                <td></td>
                                            </tr>
                                            <tr ng-if="'{{$empresa->correo_empresa}}' != '' " ng-cloack>
                                                <td>
                                                    <i class="fa fa-envelope" data-original-title="" title=""></i>
                                                </td>
                                                <td>{{$empresa->correo_empresa}}</td>
                                                <td></td>
                                            </tr>
                                            <tr ng-if="'{{$empresa->url_empresa}}' != '' " ng-cloack>
                                                <td>
                                                    <i class="fa fa-link" data-original-title="" title=""></i>
                                                </td>
                                                <td><a target="_black" href="{{$empresa->url_empresa}}">{{$empresa->url_empresa}}</a></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="tab-pane fade" id="contact">
                                        <p></p>
                                        <form role="form">
                                            <div class="form-group">
                                                <label>Full name</label>
                                                <input type="text" class="form-control rounded" placeholder="Enter full name">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="text" class="form-control rounded" placeholder="(000)0000000">
                                            </div>
                                            <div class="form-group">
                                                <label>Email address</label>
                                                <input type="email" class="form-control rounded" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> Buy this property
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Message to agent</label>
                                                <textarea class="form-control rounded" style="height: 100px;"></textarea>
                                                <p class="help-block">Please be polite and professional</p>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger" data-original-title="" title="">Send message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div ng-init="mapa = {id : 0, coords : { latitude: '{{$empresa->positionmap_empresa_latitude}}', longitude: '{{$empresa->positionmap_empresa_longitude}}'} }"></div>
                    <div ng-init="mapa_posicion = { zoom: 14, center : { latitude: '{{$empresa->positionmap_empresa_latitude}}', longitude: '{{$empresa->positionmap_empresa_longitude}}'} }"></div>

                    @if($empresa->privacidad_empresa==1)
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <div id="map_canvas">
                                    <ui-gmap-google-map 
                                        center="mapa_posicion.center" 
                                        zoom="mapa_posicion.zoom" 
                                        draggable="true" 
                                        options="options">
                                            <ui-gmap-marker 
                                                coords="mapa.coords" 
                                                idkey="mapa.id">
                                            </ui-gmap-marker>
                                    </ui-gmap-google-map>
                                </div>
                        </section>
                    </div>
                    @endif

                    
                    @if ($publicidades)

                        <div class="grid grid-detalle-empresa ">
                            <div class="grid-content">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                        @foreach($publicidades as $index => $publicidad )
                                            <figure class="effect-zoe effect-zoe-detalle-empresa">
                                                <a href="/servicios/publicacion/{{$publicidad->id_publicidad}}">
                                                    <img src="{{ url('/uploads/publicidades_high/'.$publicidad->url_imagen_publicidad)}}" class="img-2">       
                                                </a>
                                                <figcaption>                                                        
                                                    <p class="icon-links icon-links-custon">                                                            
                                                        <!--<a href="#"><i class="fa fa-link"></i></a>
                                                        <a href="#"><i class="fa fa-comment-o"></i></a>-->
                                                        <a href="http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}&text={{$publicidad->titulo_publicidad}}" onclick="window.open('http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}&text={{$publicidad->titulo_publicidad}}', 'newwindow', 'width=500, height=250'); return false;"><i class="fa fa-twitter"></i></a>
                                                        <a href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                        <span style="font-size: 12px;">{{$publicidad->titulo_publicidad}}</span>

                                                    </p>
                                                    <!--<p class="description">{{$publicidad->descripcion_publicidad}}</p>-->
                                                </figcaption>                                               
                                            </figure>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                    <center>
                        <h5><span class="label label-info">No posee publicidades registradas.</span></h5>
                    </center>
                    @endif
                    
                </div>
                <!-- end:real estates detail -->

            </div>
        
        </div>
        <!-- end container -->
    </div>
    <!-- end #contact -->
    
    @include('layouts/footer')

</div>
@endsection
