<!-- begin #header -->
    <div id="header" class="header navbar navbar-transparent navbar-fixed-top">
        <!-- begin container -->
        <div class="container">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url ('/servicios') }}" class="navbar-brand">
                    <span class="brand-logo"><img width="25" src="/img/logo.png"></span>
                    <span class="brand-text">
                        <span class="text-theme">Tu</span>Localidad
                    </span>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- begin navbar-collapse -->
            <div class="collapse navbar-collapse" id="header-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url ('servicios') }}"><i class="fa fa-star fa-1x"></i> Recomendados</a></li>
                    <li><a href="{{ url ('servicios/todo') }}"><i class="fa fa-thumb-tack"></i> Directorio</a></li>
                    @if(!\Session::get('usuario'))
                    <li><a href="{{ url ('/auth/login') }}"><i class="fa fa-sign-in"></i> Iniciar sesión</a></li>
                    @else
                    <li class="active dropdown">
                        <a href="#" data-click="scroll-to-target" data-toggle="dropdown"><i class="fa fa-user"></i> {{\Session::get('usuario')}} <b class="caret"></b></a>
                        <ul class="dropdown-menu dropdown-menu-left animated fadeInDown">
                            <li>
                                <a href="{{ url ('mis-empresas') }}">
                                    <i class="fa fa-cogs"></i> Administrar
                                </a>
                            </li>
                            <li>
                                <a href="{{ url ('perfil/cambiar-password') }}">
                                    <i class="fa fa-key"></i> Cambiar contraseña
                                </a>
                            </li>
                            <li>
                                <a href="{{ url ('perfil/cerrar') }}">
                                    <i class="fa fa-sign-in"></i> Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- end navbar-collapse -->
                <!-- end header navigation right -->
            <!-- end navbar-collapse -->
        </div>
        <!-- end container -->
    </div>
<!-- end #header -->