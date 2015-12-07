<!-- begin #header -->
<div id="header" class="header navbar navbar-default navbar-fixed-top">
	<!-- begin container-fluid -->
	<div class="container-fluid">
		<!-- begin mobile sidebar expand / collapse button -->
		<div class="navbar-header">
			<a href="{{ url('/') }}" class="navbar-brand"><img class="nav-admin-logo" src="{{ url('img/icono.png') }}">TuLocalidad</a>
			<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<!-- end mobile sidebar expand / collapse button -->
		
		<!-- begin header navigation right -->

		<ul class="nav navbar-nav navbar-right">	
			<li class="dropdown navbar-user">
				<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
					<img src="{{ url('/thema/admin/html/assets/img/user-13.jpg') }}" alt="" /> 
					<span class="hidden-xs">{{Auth::user()->correo_usuario}}</span> <b class="caret"></b>
				</a>
				<ul class="dropdown-menu animated fadeInLeft">
					<li class="arrow"></li>
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