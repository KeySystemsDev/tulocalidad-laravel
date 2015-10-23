@extends('base-admin')

@section('content')

<div id="page-container" class="fade page-sidebar-fixed page-header-fixed" >
    
	@include('layouts/navbar-admin')

	@include('layouts/sidebar-admin')

	<!-- begin #contact -->
   	<div id="content" class="content">

		<ol class="breadcrumb pull-right">
			<li><a href="{{ url('admin/registros/agregar')}}">Agregar</a></li>
			<li><a href="{{ url('admin/registros/listar')}}">Gestionar </a></li>
		</ol>
		
		<h1 class="page-header"><i class="fa fa-home"></i> Casas </h1>

		<div class="row">
		    <!-- begin col-3 -->
		    <div class="col-md-3 col-sm-6 button-index">
		        <a href="{{ url('admin/registros/agregar')}}" style="text-decoration:none;">
			        <div class="widget widget-stats bg-green">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-plus-square fa-fw"></i></div>
			            <div class="stats-title">Casas</div>
			            <div class="stats-number">Agregar</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                        <div class="stats-desc"></div>
                        <div class="stats-desc">Clicke para agregar los Casas.</div>
			        </div>
		        </a>
		    </div>

		    <!-- end col-3 -->
		    <!-- begin col-3 -->
		    <div class="col-md-3 col-sm-6">
			    <a href="{{ url('admin/registros/listar')}}" style="text-decoration:none;">
			        <div class="widget widget-stats bg-blue">
			            <div class="stats-icon stats-icon-lg"><i class="fa fa-pencil-square-o fa-fw"></i></div>
			            <div class="stats-title">Casas</div>
			            <div class="stats-number">Gestionar</div>
			            <div class="stats-progress progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                        <div class="stats-desc"></div>
                        <div class="stats-desc">Clicke para editar los Casas.</div>
			        </div>
			    </a>
		    </div>
		    <!-- end col-3 -->
		</div>
	</div>

</div>

@endsection