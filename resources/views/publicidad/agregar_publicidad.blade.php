@extends('base-admin')

@section('js')
	<script src="{{ asset('/js/controllers/publicidad/publicidad_registro.js') }}"></script>
@endsection

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" ng-controller="PublicidadController">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
    
	<div id="content" class="content ng-scope">
		
        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('mis-publicidades/agregar-publicidad')}}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('mis-publicidades/listar')}}" class="btn btn-white btn-sm p-l-20 p-r-20">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </div>
            </div>
        </ol>

        <h1 class="page-header"><i class="fa fa-bullhorn"></i> Agregar Pueblicidad </h1>
        
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
                        <h4 class="panel-title">Nueva Publicidad</h4>
                    </div>

                    <div class="panel-body">

                        <div id="wizard" class="bwizard clearfix">
                            <ol class="bwizard-steps clearfix clickable" role="tablist">
                                <li role="tab" aria-selected="true" class="active" style="z-index: 4;"><span class="label badge-inverse">1</span><a href="#step1" class="hidden-phone">
                                    Información Básica 
                                    </a><a href="#" class="hidden-phone"><small>Ingrese la información básica correspodiente a su Publicidad.</small></a><a href="#step1" class="hidden-phone">
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
                            
                            <form class="form-horizontal" id="formulario" method="post" name="publicidad" enctype="multipart/form-data">

                                <input type="hidden" name="id_empresa"><br>

                                <div class="form-group">
                                    <label class="control-label col-md-3" for="inputSuccess">Empresa:  *</label>
                                    <div class="col-md-6">
                                        <select class="form-control m-bot15" name="i_empresa">
                                            <!--<option class="option" value="" selected >seleccione una empresa</option>-->
                                            @foreach($empresas as $empresa)
                                                @if($empresa->id_empresa==$id_seleccion)
                                                    <option class="option" value="{{$empresa->id_empresa}}" selected >{{$empresa->nombre_empresa}}</option>
                                                @else
                                                    <option class="option" value="{{$empresa->id_empresa}}">{{$empresa->nombre_empresa}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Imagen de publicidad  *</label>
                                    <input type="hidden" name="namefile" id="namefile" ng-model="formData.namefile" ng-update-hidden required>
                                    <div class="col-md-6 iconic-input right">

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
                                    <label class="control-label col-md-3">Título:  *</label>
                                    <div class="col-md-6 iconic-input right">
                                        <i class="fa fa-bullhorn" data-original-title="" title=""></i>
                                        <input type="text" maxlength="30" class="form-control" placeholder="Titulo" name="i_titulo" ng-model="formData.i_titulo" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3">Descripción de la campaña:  *</label>
                                    <div class="col-md-6 iconic-input right">
                                        <textarea cols=20 rows=3 class="form-control" name="i_descripcion" ng-model="formData.i_descripcion" required></textarea>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <section class="panel">
                                            <header class="panel-heading center">
                                                <button class="btn btn-success btn-lg fa fa-check" type="button" ng-click="checkMe()" ng-disabled="publicidad.$invalid"> Agregar</button>
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
