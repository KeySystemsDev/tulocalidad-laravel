<div class="header-top">
    <!-- start:navbar -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="container">
            <!-- start:navbar-header -->
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url ('/') }}"><i class="fa fa-map-marker" data-original-title="" title=""></i> <strong>Tu</strong>Localidad<strong>.</strong></a>
            </div>
            <!-- end:navbar-header -->
            <ul class="nav navbar-nav navbar-right top-menu">
                <!--<li>
                    <input type="text" class="form-control input-sm search" placeholder="Search">
                </li>-->
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{ asset('/img/avatar1_small.jpg') }}">
                        <span class="username">{{\Session::get('usuario')}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="log-arrow-up"></div>
                        <!--<li><a href="#"><i class=" fa fa-suitcase" data-original-title="" title=""></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog" data-original-title="" title=""></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o" data-original-title="" title=""></i> Notification</a></li>-->
                        <li><a href="{{ url ('auth/cerrar') }}"><i class="fa fa-key" data-original-title="" title=""></i> Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end:navbar -->
</div>