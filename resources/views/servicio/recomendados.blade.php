@extends('base-cliente')

@section('content')

<div id="page-container" class="fade">
    
    @include('layouts/navbar-cliente')
    
    <!-- begin #contact -->
    <div class="content bg-silver-lighter">
        <!-- begin container -->
        <div class="container">
            <!--
                INICIALIZACION DE VARIABLE DE REDIREECION DE PAGINACION
            -->
            <!--<div ng-init="paginacion-href='/servicios/'"></div>-->

            <div class="content">

                <!--<div class="grid">
                    @foreach ($data->consulta as $key)
                        <figure class="effect-zoe">
                            <a href="/servicios/publicacion/{{$key->id_publicidad}}">
                                <img src="{{ url('/uploads/publicidades_high/'.$key->url_imagen_publicidad)}}" class="img-2">       
                            </a>
                            <figcaption>                                                        
                                <p class="icon-links icon-links-custon">                                                            
                                    <a href="http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}" onclick="window.open('http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}', 'newwindow', 'width=500, height=250'); return false;"><i class="fa fa-twitter"></i></a>
                                    <a href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <span style="font-size: 12px;">{{$key->titulo_publicidad}}</span>

                                </p>
                                <p class="description">{{$key->descripcion_publicidad}}</p>
                            </figcaption>                                               
                        </figure>
                    @endforeach
                </div>-->

                <div id="gallery" class="gallery isotope" style="position: relative; overflow: hidden; height: 1047px;">
                    @foreach ($data->consulta as $key)
                    <div class="image gallery-group-1 isotope-item" style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); opacity: 1;">
                        <div class="image-inner">
                            <a href="{{ url('/servicios/publicacion/'.$key->id_publicidad)}}">
                                <img src="{{ url('/uploads/publicidades_high/'.$key->url_imagen_publicidad)}}" alt="">
                            </a>
                            <p class="image-caption">
                                <i class="fa fa fa-bullhorn"></i> {{$key->titulo_publicidad}}
                            </p>
                        </div>
                        <div class="image-info">
                            <a href="{{ url('/servicios/publicacion/'.$key->id_publicidad)}}">
                                <h5 class="title">{{$key->titulo_publicidad}}</h5>
                            </a>
                            <div class="desc">
                                {{$key->descripcion_publicidad}}
                            </div>
                            <div class="icon-publicidad-box">
                                <div class="icon-links icon-links-custon">
                                    <a class="size-icon" href="http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}"  onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}', 'newwindow', 'width=500, height=250'); return false;">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>                                                        
                                    <a class="size-icon" href="http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}" onclick="window.open('http://twitter.com/share?url=http://www.tulocalidad.com.ve/servicios/empresa/{{$key->id_empresa}}&text={{$key->titulo_publicidad}}', 'newwindow', 'width=500, height=250'); return false;">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <center>
                    <div class="col-lg-12">
                        @if ($data->pages > 1)
                        <ul  class="pagination pagination-primary pagination-separated">
                            @if (1 < $data->current_page )
                                <li>  <a href ="[[paginacionhref]]?page={{$data->current_page-1}}"><</a> </li>
                            @endif                                        
                            @for ($active = 0; $active < $data->pages; $active++)
                                <li><a href ="[[paginacionhref]]?page={{$active+1}}" >{{$active+1}}</a></li>
                            @endfor
                            @if ($data->current_page < $data->pages)
                                <li>  <a href ="[[paginacionhref]]?page={{$data->current_page+1}}">></a> </li>
                            @endif
                        </ul>
                        @endif  
                    </div>
                </center>    
            </div>
                             
        </div>
        <!-- end container -->
    </div>
    <!-- end #contact -->
</div>

@include('layouts/footer')

@endsection