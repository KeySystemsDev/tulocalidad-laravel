@extends('base-admin')

@section('js')
	<script src="{{ asset('/js/controllers/empresa/empresa_registro.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="EmpresaRegistroController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
    
	<div id="content" class="content ng-scope">
		
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('mis-empresas/agregar') }}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('mis-empresas/listar') }}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </div>
            </div>
        </ol>

        <h1 class="page-header"><i class="fa fa-building"></i> Agregar Empresa </h1>
        
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-12 ui-sortable">
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand" data-original-title="" title=""><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload" data-original-title="" title=""><i class="fa fa-repeat"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse" data-original-title="" title=""><i class="fa fa-minus"></i></a>
                        </div>
                        <h4 class="panel-title">Empresa Nueva</h4>
                    </div>

                    <div class="panel-body">

                        <div id="wizard" class="bwizard clearfix">
                            <ol class="bwizard-steps clearfix clickable" role="tablist">
                                <li role="tab" aria-selected="true" class="active" style="z-index: 4;"><span class="label badge-inverse">1</span><a href="#step1" class="hidden-phone">
                                    Información Básica 
                                    </a><a href="#" class="hidden-phone"><small>Ingrese la información básica correspodiente a su Empresa.</small></a><a href="#step1" class="hidden-phone">
                                </a></li>
                            </ol>
                        </div>
                        <br>

                        <div class="well">
                            
                            <div class="row">
                                <div class="col-lg-12 center">
                                    <section class="panel">
                                        <header class="panel-heading center">
                                            <img class="img-registrar-logo" src="{{ asset('/img/tulocalidad.png') }}">
                                        </header>
                                    </section>
                                </div>
                            </div>
                            
                            <form class="form-horizontal" role="form" name="formulario" id="formulario" method ="post">
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Nombre de empresa  *</label>
                                    <div class="col-md-7 iconic-input right">
                                        <i class="fa fa-coffee" data-original-title="" title=""></i>
                                         <input type="text" maxlength="100" class="form-control" placeholder="Nombre de la Empresa" name="i_nombre" ng-model="formData.i_nombre" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Imagen de perfil  *</label>
                                    <input type="hidden" name="namefile" id="namefile" ng-model="formData.namefile" ng-update-hidden required>
                                    <div class="col-md-7 iconic-input right">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                                <img class="img-responsive img-responsive-custon" ng-src="[[img]]" alt="" style="width: 200px; height: 200px;">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                <button type="button" class="btn btn-success" style="width: 200px;" data-toggle="modal" data-target="#myModal">
                                                    <span ng-show="snipper===true" class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
                                                    Seleccionar imagen
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Rif  *</label>
                                    <div class="col-md-7 iconic-input right">
                                        <i class="fa fa-flag" data-original-title="" title=""></i>
                                        <input id="i_rif" type="text"  placeholder="J-12345678-9" class="form-control" name="i_rif" ng-model="rif" ng-blur="ValidateRif()" 
                                                ng-class="{'error':invalidrif && rifsubmit}" required>
                                        <div class="col-lg-10" ng-show="invalidrif && rifsubmit">
                                            <p class="help-block text-danger">Verifique el formato del rif (incluyendo los guiones). Ejemplo: J-12345678-9</p>
                                        </div>                                      
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Descripción  *</label>
                                    <div class="col-md-7 iconic-input right">
                                        <textarea cols=20 rows=3 maxlength="300" class="form-control" placeholder="Descripción de la Empresa" name="i_descripcion" ng-model="formData.i_descripcion" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Dirección  *</label>
                                    <div class="col-md-7 iconic-input right">
                                        <textarea cols=20 rows=3 maxlength="300" class="form-control" placeholder="Direccion de la Empresa" name="i_direccion" ng-model="formData.i_direccion" required></textarea>                                 
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="inputSuccess">Categoría  *</label>
                                    <div class="col-lg-8">
                                        <select class="form-control m-bot15 selectpicker" data-live-search="true" name="i_categoria">
                                            @foreach($categoria as $key)
                                                <option class="option" value="{{$key->id_categoria}}">{{$key->nombre_categoria}}</option>; 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Teléfono local</label>
                                    <div class="col-md-7 iconic-input right">
                                        <i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Teléfono local</label>
                                    <div class="col-md-7 iconic-input right">
                                        <i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono2">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Teléfono local</label>
                                    <div class="col-md-7 iconic-input right">
                                        <i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_telefono3">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Teléfono móvil</label>
                                    <div class="col-md-7 iconic-input right">
                                        <i class="fa fa-phone" data-original-title="" title=""></i>
                                        <input type="text" placeholder="(9999) 999-99-99" data-mask="(9999) 999-99-99" class="form-control" name="i_celular">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cemail" class="control-label col-md-3">Correo electrónico</label>
                                    <div class="col-lg-8 iconic-input right">
                                        <i class="fa fa-envelope" data-original-title="" title=""></i>
                                        <input class="form-control" type="email" placeholder="ejample@dominio.com"
                                                ng-class="{'error':formulario.i_correo.$invalid && formulario.i_correo.$touched}" name="i_correo" ng-model="formData.i_correo">
                                        
                                        <div class="col-lg-10" ng-show="formulario.i_correo.$dirty && formulario.i_correo.$invalid">
                                            <p class="help-block text-danger" ng-show="formulario.i_correo.$error.email">Verifique el formato del correo: Ejemplo: ejample@dominio.com</p>
                                        </div>
                                    </div>                                      
                                </div>

                                <div class="form-group">
                                    <label for="curl" class="control-label col-md-3">Sitio web</label>
                                    <div class="col-lg-8 iconic-input right">
                                        <i class="fa fa-link" data-original-title="" title=""></i>
                                        <input class="form-control" type="url" placeholder="Ejemplo: http://test.com" ng-class="{'error':formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched}" name="i_sitio_web" ng-model="formData.i_sitio_web">

                                        <p class="help-block text-danger" ng-show="formulario.i_sitio_web.$invalid && formulario.i_sitio_web.$touched"> Verifique la direccion: Ejemplo: http://test.com </p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" id="id_estado" name="id_estado">
                                    <label class="control-label col-md-3" for="inputSuccess">Estado  *</label>
                                    <div class="col-lg-8">
                                        <select class="form-control m-bot15" name="estado" ng-change="estado_ruta(estado)" ng-model="estado" required>
                                            <option value="" selected>
                                                Seleccione un estado
                                            </option>
                                            @foreach($estados as $key)
                                                <option value="{{$key->id_estado}} + {{$key->latitud_estado}} + {{$key->longitud_estado}}">
                                                    {{$key->nombre_estado}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="inputSuccess">Privacidad de ubicación  *</label>
                                    <div class="col-lg-8">
                                        <div class="radio-inline">
                                            <input type="radio" name="id_privacidad" id="id_privacidad" value="1" checked>
                                            Pública
                                        </div>
                                        <div class="radio-inline">
                                            <input type="radio" name="id_privacidad" id="id_privacidad" value="0">
                                            Privada                                         
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="curl" class="control-label col-md-3"></label>
                                    <div class="col-lg-8 col-lg-offset-4 iconic-input right">
                                        <div class="panel panel-danger panel-drop ">
                                            <div class="panel-body">
                                                Selecione la posición exacta de su empresa arrastrando el marcador del mapa sobre la ubicación.
                                            </div>
                                        </div>
                                    </div>
                                </div>
      
                                <input class="form-control" type="hidden" id="i_latitud" name="i_latitud" readonly="false" placeholder="Posición en el Mapa">
                                
                                <input class="form-control" type="hidden" id="i_longitud" name="i_longitud" readonly="false" placeholder="Posición en el Mapa">
                                
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12 col-maps">
                                        <section class="panel panel-map">
                                            <header class="panel-heading-maps">
                                                <div id="map_canvas">
                                                    <ui-gmap-google-map 
                                                        center="map.center" 
                                                        zoom="map.zoom" 
                                                        draggable="true" 
                                                        options="options">
                                                            <ui-gmap-marker 
                                                                coords="marker.coords" 
                                                                options="marker.options"
                                                                events="marker.events" 
                                                                idkey="marker.id">
                                                            </ui-gmap-marker>
                                                    </ui-gmap-google-map>
                                                </div>
                                            </header>
                                        </section>
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <header class="panel-heading center">
                                                <button class="btn btn-success btn-lg fa fa-check" ng-click="checkMe()" ng-disabled="formulario.$invalid || invalidrif">Registrar</button>
                                            </header>
                                        </section>
                                    </div>
                                </div>  

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- content -->

	@include('modals/upload_imagen_modal')
	@include('modals/validacion_modal')

</div>


@endsection
