@extends('base-cliente')

@section('content')

<div id="page-container" class="fade">
    
    @include('layouts/navbar-cliente')
    
    <!-- begin #contact -->
    <div class="content bg-silver-lighter">
        <!-- begin container -->
        <div class="container">
          <br><br>
 
			<div class="row" id="real-estates-detail">
                <div class="col-lg-8 col-md-8 col-xs-12">
                    <div class="panel">
                        <div class="panel-body">
                        	<div class="box-detalle-publicidad">
                            	<img class="img-detalle-publicidad img-2" src="{{ url('/uploads/publicidades_full/'.$publicidad->url_imagen_publicidad)}}">
                                <br><br>
                        		<p><b>{{ucfirst($publicidad->titulo_publicidad)}}</b>: {{$publicidad->descripcion_publicidad}}</p>
                        		<div class="footer-realestates-columns">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="/servicios/empresa/{{$publicidad->id_empresa}}" class="btn btn-default btn-block" data-original-title="" title=""><i class="fa fa-building" data-original-title="" title=""> Ver empresa</i></a>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3">
                                            <a href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$publicidad->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;" class="btn btn-facebook btn-block" data-original-title="" title=""><i class="fa fa-facebook"></i> Compartir</a>
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
                        <div class="panel-heading">
                            <header class="panel-title" style="font-size:12px;">
                                Publicidades Relacionadas
                            </header>
                        </div>
                        <div class="panel-body">
                            <div class="grid">
                                @if(count($recomendados) > 1)
                                    @foreach ($recomendados as $key)
                                        @if($key->id_publicidad  != $publicidad->id_publicidad)
                                            <div class="col-md-6">
                                                <figure class="effect-zoe img-5">
                                                    <a href="/servicios/publicacion/{{$key->id_publicidad}}">
                                                        <img src="{{ url('/uploads/publicidades_high/'.$key->url_imagen_publicidad)}}">     
                                                    </a>
                                                </figure>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="col-md-12" align="left">
                                        No tiene publicidades relacionadas.
                                    </div>
                                @endif
                            </div>        
                        </div>
                    </div>
                </div>

            </div>
 
        </div>
        <!-- end container -->
    </div>
    <!-- end #contact -->
    
    @include('layouts/footer')

</div>
@endsection
                
            
            