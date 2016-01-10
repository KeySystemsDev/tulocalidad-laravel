@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
	
	@include('layouts/navbar-admin')

    @include('layouts/sidebar-admin')
	
	<div id="content" class="content ng-scope">

        <ol class="breadcrumb pull-right">
            <div class="btn-toolbar">
                <div class="btn-group">
                    <a href="{{ url('/empresas/'.$id_empresa.'/productos')}}" class="btn btn-success btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Gestionar Productos">
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}" class="btn btn-danger btn-sm p-l-20 p-r-20" data-toggle="tooltip" data-title="Gestionar Servicios">
                        <i class="fa fa-coffee"></i>
                    </a>
                </div>
            </div>
        </ol>

        <ol class="breadcrumb navegacion-admin pull-left">
            <li><a href="{{ url('empresas') }}"><i class="fa fa-list"></i> Lista Empresas</a></li>
            <li><i class="fa fa-briefcase"></i> {{ $empresa->nombre_empresa }}</li>
        </ol>
        
        <h1 class="page-header page-header-new">.</h1>

        @include('alerts.mensaje_success')
		@include('alerts.mensaje_error')

        <div class="row">
            <div class="col-12 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{ url ('/uploads/empresas/high/'.$empresa->url_imagen_empresa) }}" alt="">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <!--<img src="images/product-details/new.jpg" class="newarrival" alt="">-->
                            <h2>{{ $empresa->nombre_empresa }}</h2>
                            <p>RIF: 108977-2</p>
                            <img src="http://localhost:8000/cart/Eshopper/images/product-details/rating.png" alt="">
                            <br>
                            @if($telefonos)
                            <span>
                                @foreach($telefonos as $telefono)
                                    <span>({{$telefono->codigo_telefono}}) {{$telefono->numero_telefono}} </span>
                                @endforeach
                            </span>
                            @endif
                            <p><b>Servicio:</b> Asesoría Informática</p>
                            <p><b>Correo:</b> {{ $empresa->correo_empresa }}</p>
                            <p><b>Web:</b> <a href="{{ $empresa->web_empresa}}"> {{ $empresa->web_empresa}} </a></p>
                            <br>
                            @if($redes)
                                @foreach($redes as $red)
                                <tr>
                                    <td>
                                        <i class="fa fa-home"></i>
                                    </td>
                                    <td> {{$red->nombre_red_social}} - {{$red->identificador_red}} </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-md-1 icon-redes-sociales">
                                    <i class="fa fa-facebook-square"></i>
                                </div>
                                <div class="col-md-1 icon-redes-sociales">
                                    <i class="fa fa-twitter-square"></i>
                                </div>
                                <div class="col-md-1 icon-redes-sociales">
                                    <i class="fa fa-instagram"></i>
                                </div>
                            </div>
                            <br><br><br>
                            <a class="btn btn-info" href="{{ 'https://auth.mercadopago.com.ve/authorization?id_client='.env('MP_APP_ID').'&response_type=code&platform_id=mp&redirect_uri='.url('/empresas/configuracionMP').'?id_empresa='.$empresa->id_empresa}}">Configurar MercadoPago</a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                 

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#details" data-toggle="tab">Detalle</a></li>
                            <li class=""><a href="#mapa" data-toggle="tab">Dirección</a></li>
                            <li class=""><a href="#productos" data-toggle="tab">Productos</a></li>
                            <li class=""><a href="#servicios" data-toggle="tab">Servicios</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="details">
                            <p>{{ $empresa->descripcion_empresa}}</p>
                        </div>
                        
                        <div class="tab-pane fade" id="mapa">
                            
                            <p> 
                                {{ $empresa->municipio_direccion}} 
                                / {{ $empresa->parroquia_direccion}} 
                                / {{ $empresa->urbanizacion_direccion}} 
                                / {{ $empresa->calle_avenida_direccion}} 
                                / {{ $empresa->casa_apto_direccion}} 
                                / {{ $empresa->piso_direccion}}
                            </p>
                            <p><b>{{ $empresa->municipio_direccion}}</b></p>
                            
                            <div ng-init="mapa = {id : 0, coords : { latitude: '{{ $empresa->latitud_empresa}}', longitude: '{{ $empresa->longitud_empresa}}'} }"></div>
                            <div ng-init="mapa_posicion = { zoom: 7, center : { latitude: '{{ $empresa->latitud_empresa}}', longitude: '{{ $empresa->longitud_empresa}}'} }"></div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-maps">
                                    <section class="panel panel-map">
                                        <header class="panel-heading-maps">
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
                                        </header>
                                    </section>
                                </div>
                            </div>

                        </div>
                        
                        <div class="tab-pane fade" id="productos">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery1.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery2.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery3.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery4.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="servicios">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery1.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery2.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery3.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="http://localhost:8000/cart/Eshopper/images/home/gallery4.jpg" alt="">
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    
                    </div>
                </div>
            
            </div>
        </div>

    </div><!-- content -->
	
</div>
@endsection
