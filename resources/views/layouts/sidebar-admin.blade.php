<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<div class="image">
					<a href="javascript:;"><img src="{{ url('/thema/admin/html/assets/img/user-13.jpg')}}" alt="" /></a>
				</div>
				<div class="info">
					TuLocalidad
					<small>©Copyright 2015</small>
				</div>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">TuLocalidad</li>


			<li class="">
				<a href="{{url('lista-productos/')}}">
				    <i class="fa fa-rocket"></i>
				    <span>Compra lo que necesites</span>
			    </a>
			</li>	


			<li class="">
				<a href="{{url('lista-empresas/')}}">
				    <i class="fa fa-rocket"></i>
				    <span>Encuentra lo que buscas</span>
			    </a>
			</li>				

			<li class="has-sub">
				<a href="javascript:;">
				    <b class="caret pull-right"></b>
				    <i class="fa fa-briefcase"></i>
				    <span>Empresas</span>
			    </a>
				<ul class="sub-menu">
				    <li><a href="{{ url('empresas/') }}">Listar Empresas</a></li>
				    <li><a href="{{ url('empresas/create') }}">Crear Empresas</a></li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
				    <b class="caret pull-right"></b>
				    <i class="fa fa-rocket"></i>
				    <span>Redes Social</span>
			    </a>
				<ul class="sub-menu">
				    <li><a href="{{ url('redes_sociales/') }}">Listar Redes</a></li>
				    <li><a href="{{ url('redes_sociales/create') }}">Crear Redes</a></li>
				</ul>
			</li>		
	        <!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
	        <!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<!-- begin #sidebar -->

<div class="sidebar-bg"></div>
<!-- end #sidebar -->