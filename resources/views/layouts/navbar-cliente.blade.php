<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <a href="{{ url('/') }}" class="navbar-brand"><img class="nav-admin-logo" src="{{ url('img/icono.png') }}">TuLocalidad</a>
        </div>
        <!-- end mobile sidebar expand / collapse button -->
        
        <!-- begin header navigation right -->

        <ul class="nav navbar-nav navbar-right">
            <li>
                <form class="navbar-form full-width">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            @if(!Auth::check())
            <li class="dropdown navbar-user">
                <a class="auth-intro-button" href="{{ url('/login') }}">
                    <i class="fa fa-sign-in" data-original-title="" title=""></i>
                    <span class="username">Iniciar sesión</span>
                </a>
            </li>
            <li class="dropdown navbar-user">
                <a class="auth-intro-button" href="{{ url('/registrar') }}">
                    <i class="fa fa-pencil-square-o" data-original-title="" title=""></i>
                    <span class="username">Registrarse</span>
                </a>
            </li>
            @endif
            @if(Auth::check())    
            <li><a href="/compras"> compras </a></li>
            <li class="dropdown" ng-init="usuario= {{Auth::user() }}">

                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14 fa-size" aria-expanded="false">
                    <i class="fa fa fa-shopping-cart"></i>
                    <span class="label" ng-if="usuario.numero_articulos != 0">[[usuario.numero_articulos]]</span>
                </a>
                <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                    <li class="dropdown-header">Total: [[usuario.costo_carrito]] Bs</li>
                    <li class="media" ng-repeat="articulo in usuario.articulos">
                        <a href="javascript:;">
                            <div class="media-left"><img src="{{ url('/uploads/productos/low') }}/[[articulo.data_producto.primera_imagen.nombre_imagen_producto]]" class="media-object" alt=""></div>
                            <div class="media-body">
                                <h5 class="media-heading">[[articulo.data_producto.nombre_producto]]</h5>
                                <div class="text-muted f-s-11">[[articulo.data_producto.precio_producto]] BsF</div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="{{ url('/lista-carrito') }}">Ver todos...</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown navbar-user">  
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ url('/thema/admin/html/assets/img/user-13.jpg') }}" alt="" /> 
                    <span class="hidden-xs">{{Auth::user()->correo_usuario}}</span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li><a href="{{ url('/empresas') }}"><i class="fa fa-gear"></i> Administrar</a></li>
                    <li><a href="{{ url('/reset-password') }}"><i class="fa fa-key"></i> Cambiar Contraseña</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sección</a></li>
                </ul>
            </li>
            @endif
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end #header -->