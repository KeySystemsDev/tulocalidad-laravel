@extends('base')

@section('content')
	
	@include('layouts/nav-top-cliente')

	@include('layouts/nav-cliente')

<div class="container" ng-controller="DetalleEmpresaController">
    <div id="main">
        
        <ol class="breadcrumb">
            <li><a href="{{ url ('/servicios/todo') }}"><i class="fa fa-coffee"></i> Servicos</a></li>
            <li><a href="{{ url ('/servicios/estado/'.$id_estado) }}"><i class="fa fa-location-arrow"></i> {{ $id_estado }}</a></li>
            <li><a href="{{ url ('/servicios/categoria/'.$id_estado.'/'.$id_categoria) }}"><i class="fa fa-cubes"></i> {{ $id_categoria }}</a></li>
            <li class="active"><i class="fa fa-rocket"></i> {{ $id_empresa }} </li>
        </ol>
        
        <!--<h3>{{$empresa->first()}}</h3>-->

        <!-- start:real estates detail -->
        <div class="row" id="real-estates-detail">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <strong>{{$empresa->nombre_empresa}}</strong>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body">
                        <div class="text-center" id="author">
                            <img width="157" height="157" src="{{ url($empresa->icon_empresa) }}">
                            <h3></h3>
                            <small class="label label-info">{{$empresa->rif_empresa}}</small>
                            <p>{{$empresa->descripcion_empresa}}</p>
                            <p class="sosmed-author">
                                <a href="#"><i class="fa fa-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus"></i></a>
                            </p>
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
                                        <td>{{$id_categoria}}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-phone" data-original-title="" title=""></i>
                                        </td>
                                        <td>{{$empresa->telefono_empresa}}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-phone" data-original-title="" title=""></i>
                                        </td>
                                        <td>{{$empresa->telefono_2_empresa}}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-phone" data-original-title="" title=""></i>
                                        </td>
                                        <td>{{$empresa->telefono_movil_empresa}}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-envelope" data-original-title="" title=""></i>
                                        </td>
                                        <td>{{$empresa->correo_empresa}}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <i class="fa fa-link" data-original-title="" title=""></i>
                                        </td>
                                        <td><a href="{{$empresa->url_empresa}}">{{$empresa->url_empresa}}</a></td>
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

            <div ng-init="coords = { latitude: '{{$empresa->positionmap_empresa_latitude}}', longitude: '{{$empresa->positionmap_empresa_longitude}}'}"></div>
            
            @if($empresa->privacidad_empresa==1)
            <div class="col-lg-12 col-md-12 col-xs-12">
                <section class="panel">
                    <header class="panel-heading">
                        <div id="map_canvas">
                            <ui-gmap-google-map 
                                center="coords" 
                                zoom="map.zoom" 
                                draggable="true" 
                                options="options">
                                    <ui-gmap-marker 
                                        coords="coords" 
                                        idkey="marker.id">
                                    </ui-gmap-marker>
                            </ui-gmap-google-map>
                        </div>
                </section>
            </div>
            @endif

        </div>
        <!-- end:real estates detail -->

    </div>
</div>

@endsection