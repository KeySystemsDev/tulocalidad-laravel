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
            <li>
                <form class="navbar-form full-width">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Buscar">
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            <li class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14 fa-size" aria-expanded="false">
                    <i class="fa fa fa-shopping-cart"></i>
                    <span class="label">3</span>
                </a>
                <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                    <li class="dropdown-header">Total: 3000 Bs</li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="{{ asset('/cart/Eshopper/images/home/gallery1.jpg') }}" class="media-object" alt=""></div>
                            <div class="media-body">
                                <h5 class="media-heading">Cosmetido de Bellza</h5>
                                <div class="text-muted f-s-11">400 BsF</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="{{ asset('/cart/Eshopper/images/home/gallery1.jpg') }}" class="media-object" alt=""></div>
                            <div class="media-body">
                                <h5 class="media-heading">Guitarra</h5>
                                <div class="text-muted f-s-11">400 BsF</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left"><img src="{{ asset('/cart/Eshopper/images/home/gallery1.jpg') }}" class="media-object" alt=""></div>
                            <div class="media-body">
                                <h5 class="media-heading">Zapatos adiddas</h5>
                                <div class="text-muted f-s-11">400 BsF</div>
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
                    <li><a href="{{ url('/reset-password') }}"><i class="fa fa-key"></i> Recuperar Contraseña</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Cerrar Sección</a></li>
                </ul>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>
<!-- end #header -->