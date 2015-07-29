<div class="header-top">
    <!-- start:navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="container">
            <!-- start:navbar-header -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url ('/servicios') }}"><i class="fa fa-map-marker" data-original-title="" title=""></i> <strong>Tu</strong>Localidad<strong></strong></a>
            </div>
            <!-- end:navbar-header -->
            @if(\Session::get('usuario'))
                <ul class="nav navbar-nav navbar-left top-menu">
                    <!-- start dropdown 1 -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url ('mis-empresas') }}">
                            <i class="fa fa-building" data-original-title="" title=""></i>
                            <span>Mis Empresas</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="{{ url ('mis-publicidades') }}">
                            <i class="fa fa-bullhorn" data-original-title="" title=""></i>
                            <span>Mis Publicidades</span>
                        </a>
                    </li>
                </ul>
            @endif

            @if(!\Session::get('usuario'))
            <ul class="nav navbar-nav navbar-right top-menu">
                <!--<li>
                    <input type="text" class="form-control input-sm search" placeholder="Search">
                </li>-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a class="auth-intro-button" href="{{ url ('/auth/register') }}">
                        <i class="fa fa-pencil-square-o"></i>
                        <span class="username">Registrate</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right top-menu">
                <!--<li>
                    <input type="text" class="form-control input-sm search" placeholder="Search">
                </li>-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a class="auth-intro-button" href="{{ url ('/auth/login') }}">
                        <i class="fa fa-sign-in"></i>
                        <span class="username">Iniciar sesión</span>
                    </a>
                </li>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right top-menu">
                <!--<li>
                    <input type="text" class="form-control input-sm search" placeholder="Search">
                </li>-->
                <!-- user login dropdown start-->
                <li class="dropdown" style="margin-top: 7px;">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="glyphicon glyphicon-user"></i>
                        <span class="username">{{\Session::get('usuario')}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="log-arrow-up"></div>
                        <!--<li><a href="#"><i class=" fa fa-suitcase" data-original-title="" title=""></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog" data-original-title="" title=""></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o" data-original-title="" title=""></i> Notification</a></li>-->                        
                        <li><a href="{{ url ('auth/cambiar-password') }}"><i class="fa fa-terminal" data-original-title="" title=""></i> Cambiar contraseña</a></li>
                        <li><a href="{{ url ('auth/cerrar') }}"><i class="fa fa-sign-in" data-original-title="" title=""></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </nav>
    <!-- end:navbar -->
</div>