<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<!--<div class="image">
					<a href="javascript:;"><img src="{{ asset('/thema/assets/img/user-13.jpg') }}" alt="" /></a>
				</div>-->
				<div class="info">
					Panel de Administracion
					<small>Menu de Gestion</small>
				</div>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Menú</li>
			
			<li>
				<a href="{{ url ('/mis-empresas') }}">
					<i class="fa fa-building"></i> 
					<span>Empresas</span>
				</a>
			</li>

			<li>
				<a href="{{ url ('/mis-publicidades') }}">
					<i class="fa fa-bullhorn"></i> 
					<span>Publicidad</span>
				</a>
			</li>

	        <!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
	        <!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->