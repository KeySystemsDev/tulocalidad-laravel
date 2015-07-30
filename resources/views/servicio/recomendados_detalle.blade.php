@extends('base')

@section('content')
	
	@include('layouts/nav-top')

	@include('layouts/nav')

	<div class="container">
        <div id="main">

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        <i class="fa fa-bullhorn" data-original-title="" title=""></i> {{$publicidad->titulo_publicidad}}
                    </h2>
                </div>
            </div>
			
			<div class="row" id="real-estates-detail">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="panel">
                        <div class="panel-body">
                        	<div class="box-detalle-publicidad">
                            	<img class="img-detalle-publicidad" src="{{ url('/uploads/publicidades_full/'.$publicidad->url_imagen_publicidad)}}">
                        		<br>
                        		<h3>{{$publicidad->descripcion_publicidad}}</h3>
                        		<br>
                        		<div class="footer-realestates-columns">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="/servicios/empresa/{{$publicidad->id_empresa}}" class="btn btn-default btn-block" data-original-title="" title=""><i class="fa fa-building" data-original-title="" title=""> Empresa</i></a>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <a href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;" class="btn btn-facebook btn-block" data-original-title="" title=""><i class="fa fa-facebook-official"></i> Compartir</a>
                                        </div>
                                        <div class="col-sm-3">
                                          	<a href="http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}&text={{$publicidad->titulo_publicidad}}" onclick="window.open('http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}&text={{$publicidad->titulo_publicidad}}', 'newwindow', 'width=500, height=250'); return false;" class="btn btn-twitter btn-block" data-original-title="" title=""><i class="fa fa-twitter"></i> Twittear</a> 
                                        </div>
                                    
                                    </div>
                                </div>
                            
                        	</div>
                        </div>
                    </div>
                </div>

          
            
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="panel panel-default">
                        <p>Publicidades relacionadas</p>
                    </div>
                </div>
                
            
            </div>

        </div>
    </div>

	@include('layouts/footer')

@endsection