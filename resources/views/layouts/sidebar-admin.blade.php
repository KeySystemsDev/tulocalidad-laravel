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

			<li class="has-sub">
				<a href="{{ url('empresas/') }}">
				    <i class="fa fa-briefcase"></i>
				    <span>EMPRESAS</span>
			    </a>
			</li>

			@if($id_empresa)
			<li class="has-sub active">
			    <a href="{{ url('/empresas/'.$id_empresa)}}">
			        
			        <i class="fa fa-briefcase"></i> 
			        <span>{{ $nombre_empresa }}</span>
			    </a>
			    <ul class="sub-menu">
			        <li class="has-sub">
			            <a href="{{ url('/empresas/'.$id_empresa.'/productos')}}">
			                Productos
			            </a>
			        </li>
			        <li class="has-sub">
			            <a href="{{ url('/empresas/'.$id_empresa.'/servicios')}}">
			                Servicios
			            </a>
			        </li>
			    </ul>
			</li>	
			@endif

			<li class="has-sub">
				<a href="javascript:;">
				    <b class="caret pull-right"></b>
				    <i class="fa fa-rocket"></i>
				    <span>REDES SOCIALES</span>
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